/**
 * Process Ajax Requests with jQuery.
 */

(function() {


    $('form[data-remote]').on('change', function(e) {

        var form = $(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');

        $.ajax({
            type: method,
            url : url,
            data: form.serialize(),

            success: function (response) {
                $('#' + response.rowid).html('$' + response.subtotal);
                $('#subtotal').html('$' + response.total);
                $('#total').html('$' + response.total);
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
            responsive: true,

            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 3 ] },
                { 'bSortable': false, 'aTargets': [ 4 ] },
                { 'bSortable': false, 'aTargets': [ 5 ] }
            ]
        });
    });

    $('#dataTables-example').DataTable({
        responsive: true,

        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 3 ] },
            { 'bSortable': false, 'aTargets': [ 4 ] },
            { 'bSortable': false, 'aTargets': [ 5 ] }
        ]
    });


});
