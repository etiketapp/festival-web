<?php

namespace App\Http\Controllers\Api;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $collection = Contract::query()->get();
        if(!$collection) {
            return response()->error('contract.not-found');
        }

        return response()->success($collection);
    }

    public function show($id)
    {
        $model = Contract::query()->find($id);
        if(!$model) {
            return response()->error('contract.not-found');
        }

        return response()->success($model);
    }
}
