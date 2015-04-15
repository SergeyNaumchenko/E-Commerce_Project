/**
 * Process Ajax Requests with jQuery.
 */

(function() {

    $('form[data-remote]').on('submit', function(e) {

        var form = $(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');

        $.ajax({
            type: method,
            url: url,
            data: form.serialize(),

            success: function (response) {
                //obj = JSON.parse(response);
                $('#id').html(response);
            }
        });
        e.preventDefault();
    });

})();