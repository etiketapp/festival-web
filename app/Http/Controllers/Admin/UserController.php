<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $routePrefix = 'admin.user.';
    protected $transPrefix = 'models.user.';
    protected $model = User::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            ['name' => 'id', 'data' => 'id', 'translate' => trans('models.common.id')],
            ['name' => 'image', 'data' => 'image', 'translate' => trans('models.common.image'), 'searchable' => false, 'orderable' => false],
            ['name' => 'full_name', 'data' => 'full_name', 'translate' => trans($this->transPrefix . 'full_name'), 'searchable' => false, 'orderable' => false],
            ['name' => 'email', 'data' => 'email', 'translate' => trans($this->transPrefix . 'email')],
            ['name' => 'actions', 'data' => 'actions', 'translate' => trans('models.common.actions'), 'searchable' => false, 'orderable' => false],
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
    public function store(UserRequest $request)
    {
        $model = new User($request->input());
        $model->password = $request->input('password');
        $model->save();

        if($request->hasFile('image')) {
            $model->image()->delete();

            $model->image()->save(new Image([
                'image' => $request->file('image')
            ]));
        }

        $model->save();

        return redirect()->route($this->routePrefix .'index')
            ->with('success', trans('messages.crud.store', ['title' => $this->title()]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::query()->find($id);
        if(!$model) {
            return response()->error('user.not-found');
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
        $model = User::query()->find($id);
        if(!$model) {
            return response()->error('user.not-found');
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
    public function update(UserRequest $request, $id)
    {
        $model = User::query()->find($id);
        if(!$model) {
            return response()->error('user.not-found');
        }

        $model->fill($request->input());
        $model->save();

        if($request->hasFile('image')) {
            $model->image()->delete();

            $model->image()->save(new Image([
                'image' => $request->file('image')
            ]));
        }

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
        $model = User::query()->find($id);
        if(!$model) {
            return response()->error('user.not-found');
        }

        $model->delete();

        return redirect()->route($this->routePrefix . 'index')
            ->with('success', trans('messages.crud.destroy', ['title' => $this->title()]));
    }

    public function datatable()
    {
        $query = User::query();

        return datatables()->eloquent($query)
            ->setRowAttr([
                'data-id' => function ($model) {
                    return $model->id;
                },
            ])
            ->rawColumns(['actions', 'image'])
            ->addColumn('actions', function ($model) {
                return view('admin.crud.datatable.actions')
                    ->with('routePrefix', $this->routePrefix)
                    ->with('model', $model);
            })
            ->addColumn('image', function (User $model){
                return view('admin.crud.datatable.image')
                    ->with('image', $model->image);
            })

            ->make(true);
    }
}
