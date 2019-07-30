<div class="form-group m-form__group row">
    <div class="col-md-2">
        <label for="image" class="pointer mrg-top-10" style="width: 100%;">
            <img src="{{ $model->image->url ?? null }}" class="mrg-btm-10" style="max-width: 100%;"/>
            <span class="btn btn-default btn-block">{{ trans('admin.common.choose') }}</span>
            {!! Form::file('image', ['class' => 'd-none file-image', 'id' => 'image', 'accept' => 'image/*']) !!}
        </label>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('first_name', trans($transPrefix.'first_name'), ['class' => 'form-control-label']) !!}
        {!! Form::text('first_name', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('last_name', trans($transPrefix.'last_name'), ['class' => 'form-control-label']) !!}
        {!! Form::text('last_name', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('email', trans($transPrefix.'email'), ['class' => 'form-control-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('password', trans($transPrefix.'password'), ['class' => 'form-control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control m-input m-input--solid', 'autocomplete' => 'new-password']) !!}
    </div>
</div>
