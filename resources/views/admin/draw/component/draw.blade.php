@extends('admin.app')
@section('subheader')
    {{ trans_choice($routePrefix.'make_draw', 2) }}
@stop
@section('content')
    {!! Form::open(['route' => 'admin.draw.makeDrawPost', 'class' => 'm-login__form m-form', 'id' => 'login-form']) !!}
    <div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('draw_id', trans($transPrefix.'category_id'), ['class' => 'form-control-label']) !!}
        {!! Form::select('draw_id', $draws, null, ['class' => 'form-control m-input--solid m-bootstrap-select m_selectpicker', 'placeholder' => 'Seçiniz', ' data-live-search="true"']) !!}
    </div>
</div>
    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">{!! 'Çekiliş Yap' !!}</button>&nbsp;&nbsp;
    {!! Form::close() !!}
@stop
