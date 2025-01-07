<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\RegionRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(private RegionRepository $RegionRepository)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Regions=$this->RegionRepository->index();
            return ApiResponseClass::sendResponse($Regions, 'All Regions retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Regions: ' . $e->getMessage());
        }

    }

    public function getParents()
    {
        try {
            $Parents=$this->RegionRepository->getParents();
            return ApiResponseClass::sendResponse($Parents,'All Parents retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Parents: ' . $e->getMessage());
        }

    }

    public function getChildren($id)
    {
        try {
            $Children=$this->RegionRepository->getChildren($id);
            return ApiResponseClass::sendResponse($Children,'All Children retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Children: ' . $e->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required','string'],
                'parent_id' => ['nullable',Rule::exists('Regions','id')]
            ]);
            if ($validator->fails())
                return ApiResponseClass::sendValidationError($validator->errors()
            );
            $Regions=$this->RegionRepository->store($request->all());
            return ApiResponseClass::sendResponse($Regions,'Region saved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save Region: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $Region = $this->RegionRepository->getById($id);
            return ApiResponseClass::sendResponse($Region, " data getted  successfully");
        }catch(Exception $e)
        {
            return ApiResponseClass::sendError('Error returned Region: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required','string'],
                'parent_id' => ['nullable',Rule::exists('Regions','id')]
            ]);
            if ($validator->fails())
                return ApiResponseClass::sendValidationError($validator->errors()
                );
            $Regions=$this->RegionRepository->update($request->all(),$id);
            return ApiResponseClass::sendResponse($Regions,'Region is updated successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save Region: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $Region=$this->RegionRepository->getById($id);
            if($this->RegionRepository->delete($Region->id)){
                return ApiResponseClass::sendResponse($Region, "{$Region->id} unsaved successfully.");
            }
            return ApiResponseClass::sendError("Region with ID {$id} may not be found or not deleted. Try again.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error deleting Region: ' . $e->getMessage());
        }
    }
}
