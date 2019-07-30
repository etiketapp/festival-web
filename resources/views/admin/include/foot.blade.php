<!--begin::Global Theme Bundle -->
<script src="/backend/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/backend/assets/app/js/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script src="/backend/assets/app/js/datatables.min.js" type="text/javascript"></script>
<script src="/backend/assets/app/js/tr.js" type="text/javascript"></script>
<script src="/backend/assets/app/js/action/laravel.js" type="text/javascript"></script>
<script src="/backend/assets/app/js/croppie.js" type="text/javascript"></script>
<script src="/backend/assets/app/js/input-mask.js" type="text/javascript"></script>
<script>
    var SummernoteDemo={init:function(){$(".summernote").summernote({height:500})}};jQuery(document).ready(function(){SummernoteDemo.init()});
    var BootstrapDatepicker=function() {
        var t;
        $(".date").datepicker( {
                rtl: mUtil.isRTL(), todayHighlight: !0, orientation: "bottom left", templates: t, autoclose: true, format: "yyyy-mm-dd", language: "tr"
            }
        ),
            $(".dateTime").datetimepicker( {
                isRTL: false,
                format: 'yyyy-mm-dd hh:ii',
                autoclose:true,
                language: 'tr'
                }
            )
    }();
    var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
    var Select2= { init:function() {
            $(".m_seciniz_select").select2( {
                    placeholder: "Seçiniz"
                }
            ),
            $(".m_tumu_select").select2( {
                    placeholder: "Tümü"
                }
            ),
            $(".m_hepsi_select").select2( {
                    placeholder: "Hepsi"
                }
            )
        }};
    jQuery(document).ready(function() { Select2.init() });
</script>
<!--end::Page Scripts -->