<?php

namespace App\Http\Controllers\API;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\ListingRepository;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;


class ListingController extends Controller
{
    /**
     * Create a new class instance.
    */
    public function __construct(private ListingRepository $ListingRepository,private UserRepository $UserRepository)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // https://example.com?user_id=[value] || https://example.com?region_id=[value] || https://example.com?category_id=[value] || https://example.com?sort=[field],sort_type sort_type=desc or asc 
    {
        try {
            $listings=$this->ListingRepository->index($request->region_id,$request->category_id);
            return ApiResponseClass::sendResponse($listings, 'All Listings retrieved successfully.'); 
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Listings: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('create-listing')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $validator = validator::make($request->all(),[
                'title'=>['required','string','max:255'],
                'description'=>['required','string'],
                'price'=>['required','numeric','between:0,99999999.99'],
                'currency_id'=>['required',Rule::exists('currencies','id')],
                'category_id'=>['required',Rule::exists('categories','id')->where(function ($query){return $query->where('parent_id', '!=', null);})],
                'region_id'=>['required',Rule::exists('regions','id')->where(function ($query){return $query->where('parent_id', '!=', null);})],
                'status'=>['required','in:جديد,شبه جديد,مستعمل'],
                'primary_image'=>['required','image','max:2048'],
                'images' =>['nullable'],
                'images.*' =>['image']
            ]);
            if ($validator->fails()){
                return ApiResponseClass::sendValidationError($validator->errors());
            }
            $user_id=PersonalAccessToken::findToken($request->bearerToken())->tokenable_id;
            $request->merge(['user_id' => $user_id]);
            $listing=$this->ListingRepository->store($request->all());
            if(!empty($request->images)){
              $this->ListingRepository->saveImages($request->images,$listing->id);
            }
            return ApiResponseClass::sendResponse($listing,'listing saved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save Listing: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $listing=$this->ListingRepository->getById($id);
            return ApiResponseClass::sendResponse($listing, " data getted  successfully");
        }catch(Exception $e)
        {
            return ApiResponseClass::sendError('Error returned Listing: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('update-listing')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $validator = Validator::make($request->all(), [
                'title'=>['sometimes','string','max:255'],
                'description'=>['sometimes','string'],
                'price'=>['sometimes','numeric','between:0,99999999.99'],
                'currency_id'=>['sometimes',Rule::exists('currencies','id')],
                'category_id'=>['sometimes',Rule::exists('categories','id')->where(function ($query){return $query->where('parent_id', '!=', null);})],
                'region_id'=>['sometimes',Rule::exists('regions','id')->where(function ($query){return $query->where('parent_id', '!=', null);})],
                'status'=>['sometimes','in:جديد,شبه جديد,مستعمل'],
                'primary_image'=>['sometimes','image','max:2048'],
            ]);
            if ($validator->fails())
                return ApiResponseClass::sendValidationError($validator->errors());
            $validatedData = $validator->validated();
            $listing=$this->ListingRepository->update($validatedData,$id);
            return ApiResponseClass::sendResponse($listing,'listing is updated successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error Update Listing: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('destroy-listing')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $Listing=$this->ListingRepository->getById($id);
            if($this->ListingRepository->delete($Listing->id)){
                return ApiResponseClass::sendResponse($Listing, "{$Listing->id} unsaved successfully.");
            }
            return ApiResponseClass::sendError("Listing with ID {$id} may not be found or not deleted. Try again.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error deleting Listing: ' . $e->getMessage());
        }
    }
}
