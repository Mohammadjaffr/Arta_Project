<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Exception;

class CategoryController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CategoryRepository $CategoryRepository)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Categories=$this->CategoryRepository->index();
            return ApiResponseClass::sendResponse($Categories, 'All Categories retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Categories: ' . $e->getMessage());
        }

    }

    public function getParents()
    {
        try {
            $Parents=$this->CategoryRepository->getParents();
            return ApiResponseClass::sendResponse($Parents,'All Parents retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Parents: ' . $e->getMessage());
        }

    }

    public function getChildren($id)
    {
        try {
            $Children=$this->CategoryRepository->getChildren($id);
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
                'parent_id' => ['nullable',Rule::exists('categories','id')]
            ]);
            if ($validator->fails()){
                return ApiResponseClass::sendValidationError($validator->errors());
            }
            $Categorie=$this->CategoryRepository->store($request->all());
            return ApiResponseClass::sendResponse($Categorie,'category saved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save category: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $Category = $this->CategoryRepository->getById($id);
            return ApiResponseClass::sendResponse($Category, " data getted  successfully");
        }catch(Exception $e)
        {
            return ApiResponseClass::sendError('Error returned Category: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                'name' => ['required','string'],
                'parent_id' => ['nullable',Rule::exists('categories','id')]
            ]);
            if ($validator->fails()){
                return ApiResponseClass::sendValidationError($validator->errors());
            }
            $Categorie=$this->CategoryRepository->update($request->all(), $id);
            return ApiResponseClass::sendResponse($Categorie,'category is updated successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save category: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category=$this->CategoryRepository->getById($id);
            if($this->CategoryRepository->delete($category->id)){
                return ApiResponseClass::sendResponse($category, "{$category->id} unsaved successfully.");
            }
            return ApiResponseClass::sendError("Category with ID {$id} may not be found or not deleted. Try again.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error deleting Category: ' . $e->getMessage());
        }
    }
}
