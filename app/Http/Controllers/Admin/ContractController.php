<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contract;

class ContractController extends Controller
{
    protected $routePrefix = 'admin.contract.';
    protected $transPrefix = 'models.contract.';
    protected $model = Contract::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            ['name' => 'id', 'data' => 'id', 'translate' => trans('models.common.id')],
            ['name' => 'title', 'data' => 'title', 'translate' => trans('models.contract.title')],
        ];
        $columns = json_encode($data);

        return view('admin.crud.datatable.index')
            ->with('datatable', route($this->routePrefix . 'datatable'))
            ->with('columns', $columns)
            ->with('is_create', false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Contract::query()->find($id);
        if(!$model) {
            return response()->error('contract.not-found');
        }

         return view('admin.crud.show')
             ->with('model', $model);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable()
    {
        $query = Contract::query();

        return datatables()->eloquent($query)
            ->setRowAttr([
                'data-id' => function ($model) {
                    return $model->id;
                },
            ])
            ->rawColumns(['title'])
            ->addColumn('title', function (Contract $model) {
                return $model->title;
            })

            ->make(true);
    }
}
