@extends('admin.app')

@section('subheader')
    {{ trans_choice($routePrefix.'title', 2) }}
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <!--begin::Form-->
                    <div class="m-portlet__body">
                        <ul class="nav nav-tabs  m-tabs-line" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#detail" role="tab">{{ trans('admin.common.detail') }}</a>
                            </li>
                            @foreach($extras ?? [] as $extra)
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#{{ $extra['id'] ?? str_slug($extra['title']) }}" role="tab">{{ $extra['title'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="detail" role="tabpanel">
                                {!! Form::model($model,['route' => array_merge([$routePrefix.'update'], $routeParameters ?? [], [$model->id]), 'files' => true, 'method' => 'PUT', 'id' => 'm_form', 'class' => 'm-form m-form--state m-form--fit m-form--label-align-right']) !!}
                                @include($routePrefix.'component.show')
                                {!! Form::close() !!}
                            </div>
                            @foreach($extras ?? [] as $extra)
                            <div class="tab-pane" id="{{ $extra['id'] ?? str_slug($extra['title']) }}" role="tabpanel">
                                @if($extra['views'] ?? null)
                                    @include($extra['views'])
                                @else
                                    @include('admin.crud.datatable.table', ['name' => str_slug($extra['title']), 'columns' => $extra['columns'], 'datatable' => $extra['datatable'], ])
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row"></div>
                        </div>
                    </div>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
@stop

@section('js')
@stop

@section('css')
@stop