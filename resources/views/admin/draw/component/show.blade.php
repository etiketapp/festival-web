<div class="form-group m-form__group row">
    <div class="col-md-2">
        <label for="image" class="pointer mrg-top-10" style="width: 100%;">
            <img src="{{ $model->image->url ?? null }}" class="mrg-btm-10" style="max-width: 100%;"/>
        </label>
    </div>
</div>
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
        {!! Form::label('advice', trans($transPrefix.'content'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('advice', $model->content, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('last_join_at', trans($transPrefix.'last_date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('last_join_at', $model->last_join_at, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
</div>