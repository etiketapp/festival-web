<div class="form-group m-form__group row">
    <div class="col-md-2">
        <label for="image" class="pointer mrg-top-10" style="width: 100%;">
            <img src="{{ $model->image->url ?? null }}" class="mrg-btm-10" style="max-width: 100%;"/>
        </label>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('first_name', trans($transPrefix.'first_name'), ['class' => 'form-control-label']) !!}
        {!! Form::text('first_name', $model->first_name, ['class' => 'form-control m-input', 'disabled']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('last_name', trans($transPrefix.'last_name'), ['class' => 'form-control-label']) !!}
        {!! Form::text('last_name', $model->last_name, ['class' => 'form-control m-input', 'disabled']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('email', trans($transPrefix.'email'), ['class' => 'form-control-label']) !!}
        {!! Form::text('email', $model->email, ['class' => 'form-control m-input', 'disabled']) !!}
    </div>
</div>