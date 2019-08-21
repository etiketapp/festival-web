<?php

namespace App\Http\Controllers\Admin;

use App\Models\DrawUser;
use App\Models\DrawUserWinner;

class DrawWinnerController extends Controller
{
    protected $routePrefix = 'admin.drawwinner.';
    protected $transPrefix = 'models.drawwinner.';
    protected $model       = DrawUserWinner::class;
    /**
     * @return mixed
     */
    public function index()
    {
        $data = [
            ['name' => 'id', 'data' => 'id', 'translate' => trans('models.common.id')],
            ['name' => 'draw', 'data' => 'draw', 'translate' => trans($this->transPrefix . 'draw')],
            ['name' => 'image', 'data' => 'image', 'translate' => trans($this->transPrefix . 'user')],
            ['name' => 'user', 'data' => 'user', 'translate' => trans($this->transPrefix . 'user')],
        ];
        $columns = json_encode($data);

        return view('admin.crud.datatable.index')
            ->with('datatable', route($this->routePrefix . 'datatable'))
            ->with('columns', $columns)
            ->with('model', $this->model)
            ->with('is_create', false);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable()
    {
        $query = DrawUserWinner::query();

        return datatables()->eloquent($query)
            ->setRowAttr([
                'data-id' => function ($model) {
                    return $model->id;
                },
            ])
            ->rawColumns(['user', 'image', 'draw'])
            ->addColumn('user', function (DrawUserWinner $model) {
                return $model->user->full_name;
            })
            ->addColumn('draw', function (DrawUserWinner $model) {
                return $model->draw->title;
            })
            ->addColumn('image', function ($model) {
                return view('admin.crud.datatable.image')
                    ->with('image', $model->user->image);
            })
            ->make(true);
    }
}
