$(document).ready(function() {
    $('product-list').DataTable();
    $('#order-list').DataTable({
        "aaSorting": []
    });
    $('#product-list').DataTable();

    $('#transection_table').DataTable();

    $('#order_cancel').DataTable({
        "aaSorting": []
    });

    $('#user-order-list').DataTable({
        "aaSorting": [],
        "filter": false,
        "bLengthChange": false,
        "ordering": false
    });
});
