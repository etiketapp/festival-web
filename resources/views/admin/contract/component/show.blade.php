<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('title', trans($transPrefix.'title'), ['class' => 'form-control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>

    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('content', trans($transPrefix.'content'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('content', null, ['class' => 'form-control m-input m-input--solid', 'disabled']) !!}
    </div>
</div>