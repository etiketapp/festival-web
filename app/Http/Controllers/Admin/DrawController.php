<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DrawRequest;
use App\Models\Draw;
use App\Models\DrawUser;
use App\Models\DrawUserWinner;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    protected $routePrefix = 'admin.draw.';
    protected $transPrefix = 'models.draw.';
    protected $model       = Draw::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            ['name' => 'id', 'data' => 'id', 'translate' => trans('models.common.id')],
            ['name' => 'image', 'data' => 'image', 'translate' => trans('models.common.image')],
            ['name' => 'title', 'data' => 'title', 'translate' => trans($this->transPrefix . 'title')],
            ['name' => 'sub_title', 'data' => 'sub_title', 'translate' => trans($this->transPrefix . 'sub_title')],
            ['name' => 'last_date', 'data' => 'last_date', 'translate' => trans($this->transPrefix . 'last_date')],
            ['name' => 'actions', 'data' => 'actions', 'translate' => trans('models.common.actions')],
        ];
        $columns = json_encode($data);

        return view('admin.crud.datatable.index')
            ->with('datatable', route($this->routePrefix . 'datatable'))
            ->with('columns', $columns)
            ->with('model', $this->model)
            ->with('is_draw', true);
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
    public function store(DrawRequest $request)
    {
        $model = new Draw($request->input());
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
        $model = Draw::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
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
        $model = Draw::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
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
    public function update(DrawRequest $request, $id)
    {
        $model = Draw::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
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
        $model = Draw::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model->delete();

        return redirect()->route($this->routePrefix .'index')
            ->with('success', trans('messages.crud.destroy', ['title' => $this->title()]));
    }

    public function makeDrawGet()
    {
        $draws = Draw::query()->pluck('title', 'id');

        return view('admin.draw.component.draw')
            ->with('draws', $draws);
    }

    public function makeDrawPost(Request $request)
    {
        $draw = Draw::query()->find(1);
        if(!$draw) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model = new DrawUserWinner();
        $winnerUser = rand(1, 3);
        $user = User::query()->find($winnerUser);
        $model->draw()->associate($draw);
        $model->user()->associate($user);
        $model->save();

        return redirect()->route($this->routePrefix .'index')
            ->with('success', trans('messages.crud.store', ['title' => $this->title()]));
    }

    public function drawResultGet(Request $request)
    {
        $model = DrawUserWinner::query()->get();
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        return view('admin.draw.component.drawresult')
            ->with('model', $model);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable()
    {
        $query = Draw::query();

        return datatables()->eloquent($query)
            ->setRowAttr([
                'data-id' => function ($model) {
                    return $model->id;
                },
            ])
            ->rawColumns(['actions', 'title', 'sub_title', 'last_date', 'image', 'draw'])
            ->addColumn('actions', function ($model) {
                return view('admin.crud.datatable.actions')
                    ->with('routePrefix', $this->routePrefix)
                    ->with('model', $model);
            })
            ->addColumn('title', function (Draw $model) {
                return $model->title;
            })
            ->addColumn('sub_title', function (Draw $model) {
                return $model->sub_title;
            })
            ->addColumn('last_date', function (Draw $model) {
                return $model->last_date;
            })
            ->addColumn('image', function ($model) {
                return view('admin.crud.datatable.image')
                    ->with('image', $model->image);
            })
            ->make(true);
    }
}