<div class="form-group m-form__group row">
    <div class="col-md-3">
        <label for="image" class="pointer mrg-top-10" style="width: 100%;">
            <img src="" class="mrg-btm-10" style="max-width: 100%;"/>
            <span class="btn btn-default btn-block">{{ trans('admin.common.choose') }}</span>
            {!! Form::file('image', ['class' => 'd-none file-image', 'id' => 'image', 'accept' => 'image/*']) !!}
        </label>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('title', trans($transPrefix.'title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('sub_title', trans($transPrefix.'sub_title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('sub_title', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('price', trans($transPrefix.'price'), ['class' => 'form-control-label']) !!}
        {!! Form::number('price', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('place', trans($transPrefix.'place'), ['class' => 'form-control-label']) !!}
        {!! Form::text('place',  null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('category_id', trans($transPrefix.'category_id'), ['class' => 'form-control-label']) !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control m-input--solid m-bootstrap-select m_selectpicker', 'placeholder' => 'Seçiniz', ' data-live-search="true"']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('content', trans($transPrefix.'content'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('content', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('about', trans($transPrefix.'about'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('about',  null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('start_date', trans($transPrefix.'start_date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('start_date', null, ['class' => 'form-control m-input m-input--solid date']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('end_date', trans($transPrefix.'start_date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('end_date', null, ['class' => 'form-control m-input m-input--solid date']) !!}
    </div>
</div>