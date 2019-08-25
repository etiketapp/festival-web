<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\FestivalRequest;
use App\Models\Category;
use App\Models\Festival;
use App\Models\FestivalGallery;
use App\Models\Image;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    protected $routePrefix = 'admin.festival.';
    protected $transPrefix = 'models.festival.';
    protected $model = Festival::class;
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
            ['name' => 'cpntent', 'data' => 'content', 'translate' => trans($this->transPrefix . 'content')],
            ['name' => 'place', 'data' => 'place', 'translate' => trans($this->transPrefix . 'place')],
            ['name' => 'price', 'data' => 'price', 'translate' => trans($this->transPrefix . 'price')],
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
        $categories = Category::query()->pluck('title', 'id');

        return view('admin.crud.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FestivalRequest $request)
    {

        $galleries      = $request->input('galleries') ?? null;
        $galleriesImage = $request->file('galleries') ?? null;

        $model = new Festival($request->input());
        $model->save();

        if($galleries){
            foreach ($galleries as $key => $gallery){
                if ($galleriesImage[$key] ?? null) {
                    $galleryId = $gallery['id'];
                    $galleryModel = FestivalGallery::query()->find($galleryId);
                    if(!$galleryModel){
                        $galleryModel = new FestivalGallery();
                    }
                    $galleryModel->festival()->associate($model);
                    $galleryModel->save();

                    $galleryModel->image()->delete();
                    $galleryModel->image()->save(new Image([
                        'image' =>  $galleriesImage[$key]['image'],
                    ]));
                }//if ($galleriesImage[$key] ?? null)
            }//foreach ($galleries as $key => $gallery)
        }//$galleries


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
        $model = Festival::query()->with('galleries')->find($id);
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
        $model = Festival::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }
        $categories = Category::query()->pluck('title', 'id');


        return view('admin.crud.edit')
            ->with('model', $model)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FestivalRequest $request, $id)
    {
        $galleries      = $request->input('galleries') ?? null;
        $galleriesImage = $request->file('galleries') ?? null;

        $model = Festival::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model->fill($request->input());
        $model->save();

        if($galleries){
            foreach ($galleries as $key => $gallery){
                if ($galleriesImage[$key] ?? null) {
                    $galleryId = $gallery['id'];
                    $galleryModel = FestivalGallery::query()->find($galleryId);
                    if(!$galleryModel){
                        $galleryModel = new FestivalGallery();
                    }
                    $galleryModel->festival()->associate($model);
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
        $model = Festival::query()->find($id);
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
        $query = Festival::query();

        return datatables()->eloquent($query)
            ->setRowAttr([
                'data-id' => function ($model) {
                    return $model->id;
                },
            ])
            ->rawColumns(['actions', 'title', 'sub_title', 'content', 'place', 'price'])
            ->addColumn('actions', function ($model) {
                return view('admin.crud.datatable.actions')
                    ->with('routePrefix', $this->routePrefix)
                    ->with('model', $model);
            })
            ->addColumn('title', function (Festival $model) {
                return $model->title;
            })
            ->addColumn('sub_title', function (Festival $model) {
                return $model->sub_title;
            })
            ->addColumn('content', function (Festival $model) {
                return $model->content;
            })
            ->addColumn('place', function (Festival $model) {
                return $model->place;
            })
            ->addColumn('price', function (Festival $model) {
                return $model->price;
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
        $view = 'admin.festival.ajax.gallery';

        return view($view)
            ->with('count', $count);
    }

    public function ajaxDelete(Request $request, $id)
    {
        $ajaxId = $request->input('ajax_id') ?? 0;
        $type   = $request->input('type') ?? null;

        $model = Festival::query()->find($id);
        if (!$model) {
            return response()->error('festival.not-found');
        }

        $model->galleries()->where('id', $ajaxId)->delete();
    }
}
