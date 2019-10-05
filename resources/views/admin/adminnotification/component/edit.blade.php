<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('title', trans($transPrefix.'title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('date', trans($transPrefix.'date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('date', null, ['class' => 'form-control m-input m-input--solid dateTime']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('text', trans($transPrefix.'text'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('text', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>