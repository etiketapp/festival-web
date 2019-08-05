<a href="{{ route($routePrefix.'show', array_merge($extraRouteParameters ?? [], [$model->id])) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="" style="z-index: 999999;">
        <i class="la la-list-alt"></i>
</a>
<a href="{{ route($routePrefix.'edit', array_merge($extraRouteParameters ?? [], [$model->id])) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="" style="z-index: 999999;">
        <i class="la la-edit"></i>
</a>
<a href="{{ route($routePrefix.'destroy', array_merge($extraRouteParameters ?? [], [$model->id])) }}" data-ajax="true" data-method="delete" data-refresh="true" data-confirm="{{trans('models.common.delete-confirm')}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="" style="z-index: 999999;">
        <i class="la la-trash"></i>
</a>
@stack('actions')