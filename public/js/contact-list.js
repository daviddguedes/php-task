$(document).ready(function (e) {

    // datatables config params
    var DT_CONFIG = {
        DATATABLES_ITEMS_PAGINATE: 2
    }

    var tableContacts = $('#tb-contacts');

    tableContacts.DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 2
        } ],
        "order": [[ 1, "desc" ]],
        "ordering": false,
        "info":     false,
        "dom": '<"toolbar">frtip',
        "pageLength": DT_CONFIG.DATATABLES_ITEMS_PAGINATE
    });

    $("div.toolbar").html('<a href="/contacts/create" class="btn btn-primary">Add new Contact</a>');

});

