@extends('admin.app')
@section('subheader')
    {{ trans_choice($routePrefix.'make_draw', 2) }}
@stop
@section('content')
    {!! Form::open(array('route' => $routePrefix . 'makeDrawPost', 'method' => 'POST')) !!}
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('draw_id', trans($transPrefix.'category_id'), ['class' => 'form-control-label']) !!}
        {!! Form::select('draw_id', $draws, null, ['class' => 'form-control m-input--solid m-bootstrap-select m_selectpicker', 'placeholder' => 'Seçiniz', ' data-live-search="true"']) !!}
    </div>
</div>
@stop
