{!! Form::select('county_id', $counties, $county_id, ['class' => 'form-control m-bootstrap-select m_selectpicker brand_id', 'placeholder' => 'Seçiniz', ' data-live-search="true"']) !!}

<script>
    var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
</script>