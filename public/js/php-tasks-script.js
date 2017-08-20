$(document).ready(function (e) {

    // set event click listen for each table > tr element
    $('#tb-contacts tbody tr').click(function() {
        var id = $(this).data('contact');
        goPage('/contacts/' + id + '/edit');
    });

});

function goPage(path) {
    location.href = path;
}

