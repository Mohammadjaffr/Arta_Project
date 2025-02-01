<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\CurrencyRepository;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
     /**
     * Create a new class instance.
    */
    public function __construct(private CurrencyRepository $CurrencyRepository,private UserRepository $UserRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('view-Currency')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $Currency=$this->CurrencyRepository->index();
            return ApiResponseClass::sendResponse($Currency, 'All Currencies retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error retrieving Currencies: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('create-Currency')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $validator = validator::make($request->all(),[
                'code'=>['required','string','max:10',Rule::unique('currencies','code')],
                'name'=>['required','string','max:50'],
            ]);
            if ($validator->fails()){
                return ApiResponseClass::sendValidationError($validator->errors());
            }
            $Currency=$this->CurrencyRepository->store($request->only(['code', 'name']));
            return ApiResponseClass::sendResponse($Currency,'Currency saved successfully.');
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error save Currency: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Request $request)
    {
        try {
            if(!$this->UserRepository->getById(PersonalAccessToken::findToken($request->bearerToken())->tokenable_id)->hasPermission('destroy-Currency')){
                return ApiResponseClass::sendError('Unauthorized', 403);
            }
            $Currency=$this->CurrencyRepository->getById($id);
            if($this->CurrencyRepository->delete($Currency->id)){
                return ApiResponseClass::sendResponse($Currency, "{$Currency->id} unsaved successfully.");
            }
            return ApiResponseClass::sendError("Currency with ID {$id} may not be found or not deleted. Try again.");
        } catch (Exception $e) {
            return ApiResponseClass::sendError('Error deleting Currency: ' . $e->getMessage());
        }
    }
}
