@extends('admin.app')

@section('subheader')
    {{ trans_choice($routePrefix.'title', 2) }}
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-progress">
                    <!-- here can place a progress bar-->
                </div>
                <div class="m-portlet__head-wrapper">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ trans_choice($routePrefix.'new_create', 2) }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a href="{!! route($routePrefix.'index', $routeParameters ?? null) !!}/" class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="la la-arrow-left"></i>
                                <span>{{ trans('models.common.cancel') }}</span>
                            </span>
                        </a>
                        <button type="button" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--md create-button">
                            <span>
                                <i class="la la-check"></i>
                                <span>{{ trans('models.common.create') }}</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            @if(Session::has('success'))
                <div class="m-alert m-alert--icon m-alert--air alert alert-success alert-dismissible fade show m--margin-20" role="alert">
                    <div class="m-alert__icon">
                        <i class="la la-warning"></i>
                    </div>
                    <div class="m-alert__text">
                        {!! Session::get('success') !!}
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                </div>
            @elseif(Session::has('error'))
                <div class="m-alert m-alert--icon alert alert-danger m--margin-20" role="alert">
                    <div class="m-alert__icon">
                        <i class="la la-warning"></i>
                    </div>
                    <div class="m-alert__text">
                        {{ Session::get('error') }}
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-close="alert" aria-label="Close">
                        </button>
                    </div>
                </div>
            @elseif(!$errors->isEmpty())
                <div class="m-alert m-alert--icon alert alert-danger m--margin-20" role="alert">
                    <div class="m-alert__icon">
                        <i class="la la-warning"></i>
                    </div>
                    <div class="m-alert__text">
                        {!! Html::ul($errors->all()) !!}
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-close="alert" aria-label="Close">
                        </button>
                    </div>
                </div>
            @endif
            <div class="m-portlet__body">
                @section('form')
                    {!! Form::open(['route' => array_merge([$routePrefix.'store'], $routeParameters ?? []), 'files' => true, 'method' => 'POST', 'id' => 'm_form', 'class' => 'm-form m-form--state m-form--fit m-form--label-align-right']) !!}
                        @include($routePrefix.'component.create')
                    {!! Form::close() !!}
                @show
            </div>
        </div>
        <!--end::Portlet-->
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.create-button', function () {
        $('#m_form').submit();
    });
});
</script>
@stop

@section('css')
@stop