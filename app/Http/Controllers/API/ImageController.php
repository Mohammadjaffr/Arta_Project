<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ImageRepository $ImageRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'listing_id'=>['required',Rule::exists('listings','id')],
                'image'=>['required','image','max:2048']
            ]);
            if ($validator->fails())
                return ApiResponseClass::sendValidationError($validator->errors()
            );
            $Image=$this->ImageRepository->store($request->all());
            return ApiResponseClass::sendResponse($Image,'Image is save successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save Image: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image'=>['required','image','max:2048']
            ]);
            if ($validator->fails())
                return ApiResponseClass::sendValidationError($validator->errors()
            );
            $Image=$this->ImageRepository->update($request->all(), $id);
            return ApiResponseClass::sendResponse($Image,'Image is updated successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error Update Image: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $image=$this->ImageRepository->getById($id);
            if($this->ImageRepository->delete($image->id)){
                return ApiResponseClass::sendResponse($image, "{$image->id} unsaved successfully.");
            }
            return ApiResponseClass::sendError("Image with ID {$id} may not be found or not deleted. Try again.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error deleting Image: ' . $e->getMessage());
        }
    }
}
