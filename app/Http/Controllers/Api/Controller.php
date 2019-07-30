<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    protected $routePrefix = null;
    protected $transPrefix = null;
    protected $model = null;

    public function __construct()
    {
        view()->share('routePrefix', $this->routePrefix);
        view()->share('transPrefix', $this->transPrefix);
        view()->share('model', $this->model);

//        config('auth.driver.default' , 'api');
    }

    protected function title()
    {
        return trans_choice($this->routePrefix . 'title', 1);
    }
}