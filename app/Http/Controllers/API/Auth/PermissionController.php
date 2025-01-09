<?php

namespace App\Http\Controllers\API\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Laravel\Sanctum\PersonalAccessToken;
use App\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(private PermissionRepository $PermissionRepository,private UserRepository $UserRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('view-permission')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $permissions = $this->PermissionRepository->index();
            return ApiResponseClass::sendResponse($permissions, 'All permissions retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving permissions: ' . $e->getMessage());
        }
    }
}
