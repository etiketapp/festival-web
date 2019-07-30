@foreach($images as $image)
    <a data-fancybox="{{ $image->imageable_id }}" href="{{ $image->url }}"><img style="max-width:150px; max-height: 150px;" src="{{ $image->url }}"></a>
@endforeach