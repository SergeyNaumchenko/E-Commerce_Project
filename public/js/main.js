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
            url : url,
            data: form.serialize(),

            success: function (response) {
                //obj = JSON.parse(response);
                //$('#id').html(response);
            }
        });
        e.preventDefault();
    });

})();


/**
 * Load links with pjax
 */
$(function() {
    $(document).pjax('a');
});


/**
 * Data table functionalities
 */
$(document).ready(function () {
    $(document).on('pjax:end', function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    $('#dataTables-example').DataTable({
        responsive: true
    });


});
