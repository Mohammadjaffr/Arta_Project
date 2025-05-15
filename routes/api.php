<?php

use App\Http\Controllers\API\Auth\forgetPasswordController;
use App\Http\Controllers\API\Auth\OTPController;
use App\Http\Controllers\API\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\RegionController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ListingController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\Auth\RoleController;
use App\Http\Controllers\API\ComplaintController;
use App\Http\Controllers\API\CurrencyController;
use App\Http\Controllers\API\Auth\UserAuthController;
use App\Http\Controllers\API\Auth\PermissionController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware(['check.auth'])->group(function () {
    Route::post('logout',[UserAuthController::class,'logout']);
    // Route::post('/comment', [CommentController::class, 'store']);
    Route::post('/listing', [ListingController::class, 'store']);
    Route::put('/listing/{id}', [ListingController::class, 'update']);
    Route::apiResource('/category',CategoryController::class)->except(['index','show']);
    Route::apiResource('/currency',CurrencyController::class)->except(['update','show']);
    Route::apiResource('/region',RegionController::class)->except(['index','show']);
    Route::apiResource('/user',UserController::class)->except(['store']);
    Route::apiResource('/comment',CommentController::class)->only(['store','delete']);
    Route::apiResource('/complaint',ComplaintController::class)->except(['update','show']);
    Route::apiResource('/image',ImageController::class)->except(['index','show']);
    Route::apiResource('/permission',PermissionController::class)->only(['index']);
    Route::apiResource('/role',RoleController::class)->except(['update']);
    Route::post('/changePassword/{id}',[UserController::class,'changePassword']);
    Route::post('/assignRole/{user_id}',[UserController::class,'assignRole']);
    Route::post('/revokeRole/{user_id}',[UserController::class,'revokeRole']);
});
//             Category           //
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{id}',[CategoryController::class,'show']);
Route::get('/categories/parents', [CategoryController::class,'getParents']);
Route::get('/categories/{id}/children', [CategoryController::class,'getChildren']);

Route::apiResource('/listing',ListingController::class)->except(['store','update']);
// Route::apiResource('/comment',CommentController::class)->except(['store']);
//             Regions           //
Route::get('/region',[RegionController::class,'index']);
Route::get('/region/{id}',[RegionController::class,'show']);
Route::get('/regions/parents', [RegionController::class,'getParents']);
Route::get('/regions/{id}/children', [RegionController::class,'getChildren']);

// ------------- Auth Route ------------- //
Route::post('/register',[UserAuthController::class,'register']);
Route::post('/login',[UserAuthController::class,'login']);
Route::post('/verifyOtpAndLogin',[OTPController::class,'verifyOtpAndLogin']);
Route::post('/resendOTP',[OTPController::class,'resendOTP']);
//Route::get('/login/google', [UserAuthController::class, 'redirectToGoogle']);
//Route::get('/login/google/callback', [UserAuthController::class, 'handleGoogleCallback']);
//             Forget Password     //
    Route::post('/forgetPassword', [forgetPasswordController::class,'forgetPassword']);
    Route::post('/resetPassword', [forgetPasswordController::class,'resetPassword']);

    Route::get('/chat', [ChatController::class, 'index']);
    Route::get('/chat/{receiverId}', [ChatController::class, 'chat']);
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);
    Route::get('/user/status/{userId}', [ChatController::class, 'checkUserStatus']);
    Route::get('/notifications', [ChatController::class, 'showUsersNotifications'])->middleware('auth:sanctum');
//    Route::post('/chat/typing', [ChatController::class, 'typing']); // إشارة الكتابة




