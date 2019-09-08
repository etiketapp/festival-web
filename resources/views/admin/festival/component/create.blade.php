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
        {!! Form::label('advice', trans($transPrefix.'content'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('advice', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('about', trans($transPrefix.'about'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('about',  null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('city_id', trans($transPrefix.'city'), ['class' => 'form-control-label']) !!}
        {!! Form::select('city_id', $cities, null, ['class' => 'form-control m-input--solid m-bootstrap-select m_selectpicker city_id', 'placeholder' => 'Seçiniz', ' data-live-search="true"']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('county_id', trans($transPrefix.'county'), ['class' => 'form-control-label']) !!}
        <div class="county_div"></div>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('address', trans($transPrefix.'address'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('address', null, ['class' => 'form-control m-input m-input--solid']) !!}
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
<!-- GALERI -->
<div class="m-form__seperator m-form__seperator--dashed"></div>
<div class="form-group m-form__group row">
    <div class="col-md-6">
        <label class="form-control-label">
            GALERİ
        </label>
    </div>
    <div class="col-md-6">
        <div class="m-form__heading">
            <a href="javascript:void(0)" class="btn btn-info" style="float: right; min-width: 120px;" onclick="$.galleries_div();">Resim Ekle</a>
        </div>
    </div>
</div>
<div class="form-group m-form__group row galleries_div"></div>
@push('js')
    <script type="text/javascript">
        $(function () {
            $(document).on('change','.city_id', function () {
                var city_id = $(this).val();
                if(city_id > 0){
                    var countyAjax = $.ajax( {
                        method: "GET",
                        url: "/admin/festival/county",
                        data: { city_id : city_id }
                    }).done(function(msg) {
                        $('.county_div').html('');
                        $('.county_div').html(msg);
                    })
                        .fail(function(jqXHR) {
                            $('.county_div').html('');
                        });
                }
            });$('.city_id').change();

            var gallery_count = $('.gallery_div').length;
            $.galleries_div = function()
            {
                gallery_count++;
                var revenue = $.ajax( {
                    method: "GET",
                    url: "/admin/festival/ajax/div",
                    data: { count: gallery_count, type: 'gallery' }
                }).done(function(msg) {
                    $('.galleries_div').append(msg);
                })
            }// $.galleries_div()

            $.div_delete = function (type, count , id) {
                if(id <= 0){
                    $('.'+type+'_div_'+ count).remove();
                }else{

                }
            }//$.div_delete(type, count , id);

            $(document).on('change','input[type="file"]', function(e){
                var tmppath = URL.createObjectURL(event.target.files[0]);
                var fileID = $(this).attr('id');
                var split = fileID.split('_');

                $('#src_'+split[1]).attr('src', tmppath);
            });//$(document).on('change','input[type="file"]', function(e)

        });
    </script>
@endpush