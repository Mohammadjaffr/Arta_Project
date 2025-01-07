<?php

namespace App\Http\Controllers\API;


use Exception;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\ListingRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;


class ListingController extends Controller
{
    /**
     * Create a new class instance.
    */
    public function __construct(private ListingRepository $ListingRepository)
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
            $validator = validator::make($request->all(),[
                'title'=>['required','string','max:255'],
                'description'=>['required','string'],
                'price'=>['required','numeric','between:0,99999999.99'],
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
            $validator = Validator::make($request->all(), [
                'title'=>['nullable','string','max:255'],
                'description'=>['nullable','string'],
                'price'=>['nullable','numeric','between:0,99999999.99'],
                'category_id'=>['nullable',Rule::exists('categories','id')->where(function ($query){return $query->where('parent_id', '!=', null);})],
                'region_id'=>['nullable',Rule::exists('regions','id')->where(function ($query){return $query->where('parent_id', '!=', null);})],
                'status'=>['nullable','in:جديد,شبه جديد,مستعمل'],
                'primary_image'=>['nullable','image','max:2048'],
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
    public function destroy($id)
    {
        try {
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
