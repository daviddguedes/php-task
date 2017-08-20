$(document).ready(function () {
    var canvas = document.getElementById('canvas-contact');
    var context = canvas.getContext('2d');
    var imageObj = new Image();

    var jcrop_api;

    // Jcrop plugin initialize options
    $('#show-img').Jcrop({
        aspectRatio: 1, // square
        boxWidth: 300,
        onSelect: updateCoords
    }, function () {
        jcrop_api = this;
    });

    // listening changes on the input #image
    $(".modal-body").on('change', '#image', function () {
        readURL(this);
    });

    // show modal image
    $('#canvas-contact').click(function () {
        $('#modal-image').modal('show');
    });

    // Clicking on the 'Save changes' button, the canvas element receives the image cropped content and close modal
    $('.modal-footer').on('click', '#btn-crop', function () {
        imageObj.onload = function () {
            var sourceX = $('#x').val();
            var sourceY = $('#y').val();
            var sourceWidth = $('#w').val();
            var sourceHeight = $('#h').val();
            context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, 0, 0, 100, 100);
            $("#imageData").val(canvas.toDataURL());
            $('#modal-image').modal('toggle');
        };
        imageObj.src = $('#show-img').attr('src');
    });

    // Check if update and set the canvas content
    if ($('input[name="action"]').val() === 'update') {
        imageObj.onload = function () {
            context.drawImage(imageObj, 0, 0);
            $("#imageData").val(canvas.toDataURL());
        };
        imageObj.src = $('input[name="imageSrc"]').val();
    }

    // Set coords to crop and show image content on canvas element
    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    // Show input image file preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show-img').attr('src', e.target.result);
                jcrop_api.setImage(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

});
