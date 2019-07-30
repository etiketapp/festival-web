var Inputmask = {
    init: function() {
       $(".phone_mask").inputmask("mask", {
            mask: "(999) 999-99-99"
        })
    }
};
jQuery(document).ready(function() {
    Inputmask.init()
});