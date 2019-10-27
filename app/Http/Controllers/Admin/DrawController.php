<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DrawRequest;
use App\Models\DieticianGallery;
use App\Models\Draw;
use App\Models\DrawGallery;
use App\Models\DrawUser;
use App\Models\DrawUserWinner;
use App\Models\User;
use App\Models\Image;
use App\Notifications\DrawWinnerUserNotification;
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
            ['name' => 'title', 'data' => 'title', 'translate' => trans($this->transPrefix . 'title')],
            ['name' => 'sub_title', 'data' => 'sub_title', 'translate' => trans($this->transPrefix . 'sub_title')],
            ['name' => 'last_date', 'data' => 'last_date', 'translate' => trans($this->transPrefix . 'last_date')],
            ['name' => 'draw_time', 'data' => 'draw_time', 'translate' => trans($this->transPrefix . 'draw_time')],
            ['name' => 'actions', 'data' => 'actions', 'translate' => trans('models.common.actions')],
        ];
        $columns = json_encode($data);

        return view('admin.crud.datatable.index')
            ->with('datatable', route($this->routePrefix . 'datatable'))
            ->with('columns', $columns)
            ->with('model', $this->model);
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
        $galleries      = $request->input('galleries') ?? null;
        $galleriesImage = $request->file('galleries') ?? null;

        $model = new Draw($request->input());
        $model->save();

        $users = User::query()->find(1);

        if($galleries){
            foreach ($galleries as $key => $gallery){
                if ($galleriesImage[$key] ?? null) {
                    $galleryId = $gallery['id'];
                    $galleryModel = DrawGallery::query()->find($galleryId);
                    if(!$galleryModel){
                        $galleryModel = new DrawGallery();
                    }
                    $galleryModel->draw()->associate($model);
                    $galleryModel->save();

                        $galleryModel->image()->delete();
                    $galleryModel->image()->save(new Image([
                        'image' =>  $galleriesImage[$key]['image'],
                    ]));
                }//if ($galleriesImage[$key] ?? null)
            }//foreach ($galleries as $key => $gallery)
        }//$galleries
       $users->notify(new DrawWinnerUserNotification($model, $users));

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
        $model = Draw::query()->with('galleries')->find($id);
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
        $galleries      = $request->input('galleries') ?? null;
        $galleriesImage = $request->file('galleries') ?? null;

        $model = Draw::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model->fill($request->input());
        $model->save();

        if($galleries){
            foreach ($galleries as $key => $gallery){
                if ($galleriesImage[$key] ?? null) {
                    $galleryId = $gallery['id'];
                    $galleryModel = DrawGallery::query()->find($galleryId);
                    if(!$galleryModel){
                        $galleryModel = new DrawGallery();
                    }
                    $galleryModel->draw()->associate($model);
                    $galleryModel->save();

                    $galleryModel->image()->delete();
                    $galleryModel->image()->save(new Image([
                        'image' =>  $galleriesImage[$key]['image'],
                    ]));
                }//if ($galleriesImage[$key] ?? null)
            }//foreach ($galleries as $key => $gallery)
        }//$galleries

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
        $drawId = $request->input('draw_id');
        $draw = DrawUser::query()->where('draw_id', $drawId)->with('user')->first();
        if(!$draw) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model = new DrawUserWinner();
        $winnerUser = rand(1, $draw->count());
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
            ->rawColumns(['actions', 'title', 'sub_title', 'last_date', 'draw', 'draw_time'])
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
            ->addColumn('draw_time', function (Draw $model) {
                return $model->draw_time;
            })
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxDiv(Request $request)
    {
        $count  = (int) $request->input('count') ?? 1;
        $view = 'admin.draw.ajax.gallery';

        return view($view)
            ->with('count', $count);
    }

    public function ajaxDelete(Request $request, $id)
    {
        $ajaxId = $request->input('ajax_id') ?? 0;
        $type   = $request->input('type') ?? null;

        $model = Draw::query()->find($id);
        if (!$model) {
            return response()->error('draw.not-found');
        }

        $model->galleries()->where('id', $ajaxId)->delete();
    }
}
