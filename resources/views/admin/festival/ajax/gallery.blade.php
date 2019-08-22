<div class="col-md-3 gallery_div gallery_div_{{ $count }} mb-4">
    <div class="col-md-12">
        <label for="image_{{ $count }}" class="pointer mrg-top-10" style="width: 100%;">
            <span class="btn btn-default btn-block">Resim Seç</span>
            {!! Form::file('galleries['.$count.'][image]', ['class' => 'd-none file-image', 'id' => 'image_'.$count, 'accept' => 'image/*']) !!}
        </label>
    </div>
    <div class="col-md-12 text-center mb-2 imgDiv{{ $count }}" style="height: 200px;">
        <img src="" id="src_{{ $count }}" style="width: auto; max-width: 100%; max-height: 200px; text-align: center;" />
    </div>
    <div class="col-md-12">
        {!! Form::hidden('galleries['.$count.'][id]', 0) !!}
        <a href="javascript:void(0);" class="btn btn-danger" onclick="$.div_delete('gallery', {{ $count }}, 0)" style="float: right;">Sil</a>
    </div>
</div>
