<?php
namespace App\Http\Controllers\API;

use App\Events\MessageSent;
use App\Events\UserTyping;
use App\Models\Message;
use App\Models\User;
use App\Notifications\ChatMessage;
use App\Repositories\ChatRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class ChatController extends Controller
{
    protected $chatRepository;

    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    public function index(Request $request)
    {
        try {
            $conversations = $this->chatRepository->index();

            foreach ($conversations as &$conversation) {
                $conversation->is_online = $this->isOnline($conversation->receiver_id);
            }

            return ApiResponseClass::sendResponse($conversations, 'All conversations retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError($e, 'Error retrieving conversations');
        }
    }

    public function chat($receiverId)
    {
        try {
            $receiver = User::findOrFail($receiverId);
            $messages = $this->chatRepository->getChatMessages($receiverId);
            return ApiResponseClass::sendResponse($messages, 'تم استقبال جميع الرسائل بنجاح .');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving messages: ' . $e->getMessage(), 500);
        }
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiver_id' => ['required', Rule::exists('users', 'id')],
            'message' => ['required', 'string', 'max:1000'], // حد أقصى للرسالة
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendValidationError($validator->errors()->first(), $validator->errors());
        }

        try {
            $messageData = [
                'sender_id' => PersonalAccessToken::findToken($request->bearerToken())->tokenable_id,
                'receiver_id' => $request->receiver_id,
                'message' =>$request->message
            ];

            $message = $this->chatRepository->store($messageData);

            $receiver = User::findOrFail($request->receiver_id);
            $receiver->notify(new ChatMessage(
                $message->id,
                $message->sender->name,
                $message->message,
                $message->sender->id
            ));
            // send the message realtime for all users in system
            broadcast(new MessageSent($message))->toOthers();

            return ApiResponseClass::sendResponse($message, ' تم ارسال الرساله الى '.$message->receiver->name.'  بنجاح: ', 201);
        } catch (Exception $e) {
            // تسجيل الخطأ وإرجاع استجابة
            return ApiResponseClass::sendError('فشل في ارسال الرساله : ' . $e->getMessage(), 500);
        }
    }
    public function checkUserStatus($userId)
    {
        $status = $this->isOnline($userId) ? 'Online' : 'Offline';
        return response()->json(['user_id' => $userId, 'status' => $status]);
    }
    public function isOnline($userId)
    {
        return Cache::has('user-is-online-' . $userId);
    }

    public function showUsersNotifications(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $notifications = $user->notifications()
            ->whereNotNull('data->user_id')
            ->orderByDesc('created_at')
            ->get();


        return ApiResponseClass::sendResponse($notifications,'تم عرض جميع الاشعارات بنجاح ');
    }

}
