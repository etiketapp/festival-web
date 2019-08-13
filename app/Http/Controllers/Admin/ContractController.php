<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            ['name' => 'actions', 'data' => 'actions', 'translate' => trans('models.common.actions')],
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
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function edit($id)
    {
        $model = Contract::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        return view('admin.crud.edit')
            ->with('model', $model);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = Contract::query()->find($id);
        if(!$model) {
            return redirect()->route($this->routePrefix . 'index');
        }

        $model->fill($request->input());
        $model->save();

        return redirect()->route($this->routePrefix . 'index')
            ->with('success', trans('messages.crud.update', ['title' => $this->title()]));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        return redirect()->route($this->routePrefix . 'index');
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
            ->rawColumns(['actions', 'title'])
            ->addColumn('actions', function ($model) {
                return view('admin.crud.datatable.actions')
                    ->with('routePrefix', $this->routePrefix)
                    ->with('model', $model);
            })
            ->addColumn('title', function (Contract $model) {
                return $model->title;
            })

            ->make(true);
    }
}
