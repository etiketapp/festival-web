/*
 <a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request

 - Or, request confirmation in the process -

 <a href="posts/2" data-method="delete" data-confirm="Are you sure?">
 */

(function () {


    var modal = {
        initialize: function () {
            this.registerEvents();
        },

        registerEvents: function () {
            jQuery(document).on('click', 'a[data-modal]', this.handleMethod);
        },

        handleMethod: function (e) {
            var link = jQuery(this);

            jQuery.ajax({
                type: "GET",
                url: link.attr('href'),
                data: {}
            })
                .done(function (response) {
                    $('#modal').remove();

                    $('body').append(response);

                    $('#modal').modal();
                });


            e.preventDefault();
        }
    };

    modal.initialize();

    var laravel = {

        initialize: function () {
            this.methodLinks = jQuery('a[data-method]');

            this.registerEvents();
        },

        registerEvents: function () {
            jQuery(document).on('click', 'a[data-method]', this.handleMethod);
        },

        handleMethod: function (e) {
            var link = jQuery(this);
            var httpMethod = link.data('method').toUpperCase();
            var isAjax = link.data('ajax');
            var isRefresh = link.data('refresh');
            var isPageRefresh = link.data('page-refresh');
            var modal = link.data('modal');
            var datatable = link.data('datatable') || 'datatable';
            var form;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if (jQuery.inArray(httpMethod, ['POST', 'PUT', 'DELETE']) === -1) {
                return;
            }

            if (link.data('before-submit')) {
                eval(link.data('before-submit'))
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if (link.data('confirm')) {
                if (!laravel.verifyConfirm(link)) {
                    return false;
                }
            }

            if (isAjax) {
                laravel.createAjax(link, isPageRefresh, isRefresh, datatable);
            }
            else {
                form = laravel.createForm(link);
                form.submit();
            }

            e.preventDefault();
        },

        verifyConfirm: function (link) {
            return confirm(link.data('confirm'));
        },

        createForm: function (link) {
            var form =
                jQuery('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                jQuery('<input>', {
                    'type': 'hidden',
                    'name': 'csrf_token',
                    'value': '<?php echo csrf_token(); ?>' // hmmmm...
                });

            var hiddenInput =
                jQuery('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        },

        createAjax: function (link, isPageRefresh, isRefresh, datatable) {
            jQuery.ajax({
                type: "POST",
                url: link.attr('href'),
                data: {
                    '_method': link.data('method')
                }
            })
                .done(function (json) {
                    // Show Message
                    if (json.modal) {
                        $modal = $(json.modal);
                        if (json.form.url) {
                            $modal.find('form').attr('action', json.form.url)
                        }
                        console.log(json.form);
                        for (key in json.form.inputs) {
                            var value = json.form.inputs[key];
                            $modal.find('input[name=' + key + ']').val(value)
                            console.log(key, value, $modal.find('input[name=' + key + ']'))
                        }

                        $(json.modal).modal('show');
                    }
                    else {
                        swal({
                                title: json.title,
                                text: json.message,
                                type: 'success',
                            },
                            function (isConfirm) {
                                if (isPageRefresh) {
                                    window.location.reload();
                                }
                            });
                    }
                    if (isRefresh) {
                        // Remove
                        $('#' + datatable).DataTable().draw(false);
                    }
                })
                .fail(function (jqXHR) {
                    console.log(jqXHR);
                    var json = jqXHR.responseJSON;
                    // Show Message
                    if (json.modal) {
                        $modal = $(json.modal);
                        if (json.form.url) {
                            $modal.find('form').attr('action', json.form.url)
                        }
                        console.log(json.form);
                        for (key in json.form.inputs) {
                            var value = json.form.inputs[key];
                            $modal.find('input[name=' + key + ']').val(value)
                            console.log(key, value, $modal.find('input[name=' + key + ']'))
                        }

                        $(json.modal).modal('show');
                    }
                    else {
                        if (json.message) {
                            swal({
                                title: json.title,
                                text: json.message,
                                type: 'error',
                            })
                        }
                    }
                    if (isRefresh) {
                        // Remove
                        $('#datatable').DataTable().draw(false);
                    }
                });
        }
    };

    laravel.initialize();

})();
