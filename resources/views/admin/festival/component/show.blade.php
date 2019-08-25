<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('title', trans($transPrefix.'title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('title', $model->title, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('sub_title', trans($transPrefix.'sub_title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('sub_title', $model->sub_title, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('price', trans($transPrefix.'price'), ['class' => 'form-control-label']) !!}
        {!! Form::number('price', $model->price, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('place', trans($transPrefix.'place'), ['class' => 'form-control-label']) !!}
        {!! Form::text('place',  $model->place, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('content', trans($transPrefix.'content'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('content', $model->content, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('about', trans($transPrefix.'about'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('about', $model->about, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('start_date', trans($transPrefix.'start_date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('start_date', null, ['class' => 'form-control m-input m-input--solid date']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('end_date', trans($transPrefix.'end_date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('end_date', null, ['class' => 'form-control m-input m-input--solid date']) !!}
    </div>
</div>