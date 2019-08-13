<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('title', trans($transPrefix.'title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('title', $model->title, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('content', trans($transPrefix.'sub_title'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('content', $model->content, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>
