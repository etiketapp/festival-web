<div class="form-group m-form__group row">
    <div class="col-md-2">
        <label for="image" class="pointer mrg-top-10" style="width: 100%;">
            <img src="{{ $model->image->url ?? null }}" class="mrg-btm-10" style="max-width: 100%;"/>
        </label>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('full_name', trans($transPrefix.'full_name'), ['class' => 'form-control-label']) !!}
        {!! Form::text('full_name', $model->full_name, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('email', trans($transPrefix.'email'), ['class' => 'form-control-label']) !!}
        {!! Form::text('email', $model->email, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('gender', trans($transPrefix.'gender'), ['class' => 'form-control-label']) !!}
        {!! Form::text('gender', $model->gender, ['class' => 'form-control m-input m-input--solid', 'disabled', 'autocomplete' => 'new-password']) !!}
    </div>
</div>
