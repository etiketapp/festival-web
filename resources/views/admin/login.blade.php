<!DOCTYPE html>
<html lang="tr">
@include('admin.include.head')
@section('css')
@show
@stack('css')
<head>

</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(/backend/assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="/backend/assets/app/media/img/logo/festival.png" style="max-width: 325px;">
                    </a>
                </div>
                    <div class="m-login__head">
                        <h3 class="m-login__title">{!! trans('admin.login.sing_in') !!}</h3>
                    </div>
                    {{ Form::open(array('route' => 'admin.login', 'method' => 'POST', 'data-redirect' => route('admin.home.index'))) }}
                    <div class="form-group m-form__group">
{{--                        {!! Form::email('email', null, ['class' => 'form-control m-input', 'placeholder' => trans('admin.login.email'), 'autocomplate' => 'off', 'required']) !!}--}}
                        {{ Form::text('email', null, ['class' => 'form-control m-input', 'placeholder' => trans('admin.login.email')]) }}
                    </div>
                    <div class="form-group m-form__group">
{{--                        {!! Form::password('password', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => trans('admin.login.password'), 'required']) !!}--}}
                        {!! Form::password('password', ['class' => 'form-control m-input m-input', 'placeholder' => trans('admin.login.password')]) !!}
                    </div>
                    <!--
                    <div class="row m-login__form-sub">
                        <div class="col m--align-right m-login__form-right">
                            <a href="javascript:;" id="m_login_forget_password" class="m-link">{!! trans('admin.login.forget-password') !!}</a>
                        </div>
                    </div>
                    -->
                <center>
                    <div class="m-login__form-action">
                        <button href="{{ route('admin.login') }}" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">{!! trans('admin.login.sing-in') !!}</button>
                    </div>
                </center>
                    {!! Form::close() !!}
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">{!! trans('admin.login.forget-password') !!}</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            {!! Form::email('email', null, ['class' => 'form-control m-input', 'id' => 'm_email', 'placeholder' => trans('admin.login.email'), 'autocomplate' => 'off', 'required']) !!}
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">{!! trans('admin.login.submit-password') !!}</button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">{!! trans('admin.login.cencel') !!}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
@include('admin.include.foot')
</body>

<!-- end::Body -->
</html>