<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\RegionController;
use App\Http\Controllers\API\ListingController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ComplaintController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\Auth\UserAuthController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware(['check.auth'])->group(function () {
    Route::post('logout',[UserAuthController::class,'logout']);
    // Route::post('/comment', [CommentController::class, 'store']);
    Route::post('/listing', [ListingController::class, 'store']);
    Route::put('/listing/{id}', [ListingController::class, 'update']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::post('/region', [RegionController::class, 'store']);
    Route::apiResource('/user',UserController::class)->except(['store']);
    Route::apiResource('/comment',CommentController::class)->only(['store','delete']);
    Route::apiResource('/complaint',ComplaintController::class)->except(['update','show']);
    Route::apiResource('/image',ImageController::class)->except(['index','show']);
    Route::post('/changePassword',[UserController::class,'changePassword']);
});

Route::apiResource('/category',CategoryController::class)->except(['store']);
Route::apiResource('/region',RegionController::class)->except(['store']);
Route::apiResource('/listing',ListingController::class)->except(['store','update']);
// Route::apiResource('/comment',CommentController::class)->except(['store']);

Route::get('/regions/parents', [RegionController::class,'getParents']);
Route::get('/regions/{id}/children', [RegionController::class,'getChildren']);

Route::get('/categories/parents', [CategoryController::class,'getParents']);
Route::get('/categories/{id}/children', [CategoryController::class,'getChildren']);

// ------------- Auth Route ------------- //
Route::post('/register',[UserAuthController::class,'register']);
Route::post('/login',[UserAuthController::class,'login']);
Route::get('/login/google', [UserAuthController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [UserAuthController::class, 'handleGoogleCallback']);




