<?php

namespace App\Http\Controllers\Api;

use App\Models\Festival;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FestivalController extends Controller
{
    public function index()
    {
        $model = Festival::query()->with('image')->get();

        return response()->success($model);
    }
}
