<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminNotification;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    protected $routePrefix = 'admin.adminnotification.';
    protected $transPrefix = 'models.adminnotification.';
    protected $model = AdminNotification::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            ['name' => 'id', 'data' => 'id', 'translate' => trans('models.common.id')],
            ['name' => 'title', 'data' => 'title', 'translate' => trans($this->transPrefix. 'title')],
            ['name' => 'text', 'data' => 'text', 'translate' => trans($this->transPrefix. 'text')],
            ['name' => 'actions', 'data' => 'actions', 'translate' => trans('models.common.actions')],
        ];
        $columns = json_encode($data);

        return view('admin.crud.datatable.index')
            ->with('datatable', route($this->routePrefix . 'datatable'))
            ->with('columns', $columns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new AdminNotification($request->input());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = AdminNotification::query()->find($id);
        if(!$model) {
            return redirect()->route($this->transPrefix . 'index');
        }

        return view('admin.crud.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = AdminNotification::query()->find($id);
        if(!$model) {
            return redirect()->route($this->transPrefix . 'index');
        }

        return view('admin.crud.edit')
            ->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = AdminNotification::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model->fill($request->input());
        $model->save();

        return redirect()->route($this->routePrefix . 'index')
            ->with('success', trans('messages.crud.update', ['title' => $this->title()]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = AdminNotification::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model->delete();

        return redirect()->route($this->routePrefix . 'index')
            ->with('success', trans('messages.crud.destroy', ['title' => $this->title()]));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable()
    {
        $query = AdminNotification::query();

        return datatables()->eloquent($query)
            ->setRowAttr([
                'data-id' => function ($model) {
                    return $model->id;
                },
            ])
            ->rawColumns(['actions'])
            ->addColumn('actions', function ($model) {
                return view('admin.crud.datatable.actions')
                    ->with('routePrefix', $this->routePrefix)
                    ->with('model', $model);
            })
            ->addColumn('title', function (AdminNotification $model) {
                return $model->title;
            })
            ->addColumn('text', function (AdminNotification $model) {
                return $model->text;
            })
            ->make(true);
    }
}
