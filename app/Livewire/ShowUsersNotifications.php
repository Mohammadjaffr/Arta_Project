<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ShowUsersNotifications extends Component
{
    public function render()
    {
        $notifications = Auth::user()->unreadNotifications
            ->where('data.user_id', '!=', null)
            ->sortByDesc('created_at')
            ->groupBy('data.user_id')
            ->map(function ($notifications) {
                $latest = $notifications->first();
                $user = User::query()->find($latest->data['user_id']);
                return [
                    'notification' => $latest,
                    'user' => $user,
                    'count' => $notifications->count(),
                    'is_online' => $user && $user->isOnline(),
                    'message' => Str::limit($latest->data['message'] ?? 'إشعار جديد', 60)
                ];
            });
        return view('livewire.show-users-notifications',compact('notifications'));
    }
}
