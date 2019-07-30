@if($image)
    <a data-fancybox="{{ $image->imageable_id }}" href="javascript:;"><img style="max-width:50px; max-height: 50px;" src="{{ $image->url }}"></a>
@endif