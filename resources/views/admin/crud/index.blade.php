@extends('admin.app')

@section('subheader')
    {{ trans_choice($routePrefix.'title', 2) }}
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ trans_choice($routePrefix.'title', 2) }}
                    </h3>
                </div>
            </div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right mt-3">
                @if($is_draw ?? null)
                    <a href="{!! route($routePrefix. 'makeDrawGet', $routeParameters ?? []) !!}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">Çekiliş Yap</a>
                </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                @endif
                @if($is_create ?? true)
                    <a href="{!! route($routePrefix.'create', $routeParameters ?? []) !!}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                <span>
                    <i class="la la-plus-circle"></i>
                    <span>{{ trans_choice($routePrefix.'new_create', 2) }}</span>
                </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                @endif
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__content">
                @if(Session::has('success'))
                    <div class="m-alert m-alert--icon m-alert--air alert alert-success alert-dismissible fade show" role="alert">
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
                    <div class="m-alert m-alert--icon alert alert-danger" role="alert">
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
                    <div class="m-alert m-alert--icon alert alert-danger" role="alert">
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
            </div>
            @yield('table-content')
        </div>
    </div>
@stop
