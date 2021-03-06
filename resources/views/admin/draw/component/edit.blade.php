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
        {!! Form::label('content', trans($transPrefix.'content'), ['class' => 'form-control-label']) !!}
        {!! Form::textarea('content', null, ['class' => 'form-control m-input m-input--solid']) !!}
    </div>
    <div class="col-lg-6 m-form__group-sub">
        {!! Form::label('last_join_at', trans($transPrefix.'last_date'), ['class' => 'form-control-label']) !!}
        {!! Form::text('last_join_at',  null, ['class' => 'form-control m-input m-input--solid date']) !!}
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
<div class="form-group m-form__group row galleries_div">
    @php {{ $count = 1; }} @endphp
    @if($model->galleries)
        @foreach($model->galleries as $gallery)
            <div class="col-md-3 gallery_div gallery_div_{{ $count }} mb-4">
                <div class="col-md-12">
                    <label for="image_{{ $count }}" class="pointer mrg-top-10" style="width: 100%;">
                        <span class="btn btn-default btn-block">Resim Seç</span>
                        {!! Form::file('galleries['.$count.'][image]', ['class' => 'd-none file-image', 'id' => 'image_'.$count, 'accept' => 'image/*']) !!}
                    </label>
                </div>
                <div class="col-md-12 text-center mb-2 imgDiv{{ $count }}" style="height: 200px;">
                    <img src="{{ $gallery->image->url ?? null }}" id="src_{{ $count }}" style="width: auto; max-width: 100%; max-height: 200px; text-align: center;" />
                </div>
                <div class="col-md-12">
                    {!! Form::hidden('galleries['.$count.'][id]', $gallery->id) !!}
                    <a href="javascript:void(0);" class="btn btn-danger" onclick="$.div_delete('gallery', {{ $count }}, {{ $gallery->id }})" style="float: right;">Sil</a>
                </div>
            </div>
            @php {{ $count++; }} @endphp
        @endforeach
    @endif
</div>
@push('js')
    <script type="text/javascript">
        $(function () {
            var gallery_count = $('.gallery_div').length;
            $.galleries_div = function()
            {
                gallery_count++;
                var revenue = $.ajax( {
                    method: "GET",
                    url: "/admin/draw/ajax/div",
                    data: { count: gallery_count, type: 'gallery' }
                }).done(function(msg) {
                    $('.galleries_div').append(msg);
                })
            }// $.galleries_div()

            $.div_delete = function (type, count , id) {
                if(id <= 0){
                    $('.'+type+'_div_'+ count).remove();
                }else{
                    var confirm1 = confirm('Silmek İstediğinize Emin Nisiniz?');
                    if (confirm1) {
                        var revenue = $.ajax({
                            method: "POST",
                            url: "/admin/draw/{{$model->id }}/ajax/delete",
                            data: {ajax_id: id, type: type}
                        }).done(function (msg) {
                            $('.'+type+'_div_'+ count).remove();
                        })
                    }
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