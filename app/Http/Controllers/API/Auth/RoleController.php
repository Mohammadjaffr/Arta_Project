<?php

namespace App\Http\Controllers\API\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
     /**
     * Create a new class instance.
     */
    public function __construct(private RoleRepository $RoleRepository,private UserRepository $UserRepository)
    {
        //
    }

     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('view-role')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $roles = $this->RoleRepository->index();
            return ApiResponseClass::sendResponse($roles, 'All roles retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving roles: ' . $e->getMessage());
        }
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('create-role')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $validator = Validator::make($request->all(), [
                'name' => ['required','string',Rule::unique('roles','name')],
                'display_name' => ['required','string'],
                'permissions' => ['required','array'],
                'permissions.*' => [Rule::exists('permissions','id')],
            ]);
            if ($validator->fails()){
                return ApiResponseClass::sendValidationError($validator->errors());
            }
            if (isset($request->permissions) && !is_array($request->permissions)) {
                $request['permissions']= [$request->permissions];
            }
            $role = $this->RoleRepository->store($request->only(['name', 'display_name']));
            $role->permissions()->sync($request->permissions);
            return ApiResponseClass::sendResponse($role, "{$role['name']} created successfully.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error creating role: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $roleId ,Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('view-role')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $role = $this->RoleRepository->getById($roleId);
            return ApiResponseClass::sendResponse($role, 'Role retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving role: ' . $e->getMessage());
        }
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $roleId)
    {
        //
    }

 
     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $roleId ,Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('destroy-role')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $role = $this->RoleRepository->getById($roleId);
            if ($this->RoleRepository->delete($roleId)) {
                return ApiResponseClass::sendResponse($role, "{$role->role_name} deleted successfully.");
            }
            return ApiResponseClass::sendError("Notification with ID {$roleId} may not be found or not deleted. Try again.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error deleting role: ' . $e->getMessage());
        }
    }
}
