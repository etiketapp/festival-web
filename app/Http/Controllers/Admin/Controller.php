<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;

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
    }

    protected function title()
    {
        return trans_choice($this->routePrefix . 'title', 1);
    }
}