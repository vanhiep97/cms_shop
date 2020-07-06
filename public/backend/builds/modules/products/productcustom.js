jQuery(document).ready(function ($) {
    $("#selectall").click(function () {
        $(".individual").prop("checked", $(this).prop("checked"));
    });

    $(".per-select-all").click(function () {
        $(".per-select-one").prop("checked", $(this).prop("checked"));
    });

    $(document).on("click", '#avatar', function () {
        $('#pro_avatar').click();
    });

    $(document).on("click", '#upload-gallery', function () {
        $('#files').click();
    });

    function readURLAvatar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#pro_avatar').change(function () {
        readURLAvatar(this);
    });

    function readURL(input) {
        $('.upload-gallery').css('background', 'rgb(248, 248, 248)');
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (file.type.match('image.*')) {
                var picReader = new FileReader();
                picReader.addEventListener("load", function (event) {
                    var picFile = event.target;
                    var div = document.createElement("div");
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                        "title='preview image'/>";
                    output.insertBefore(div, null);
                });
                //Read the image
                $('#clear, #result').show();
                picReader.readAsDataURL(file);
            } else {
                alert("You can only upload image file.");
                $(this).val("");
            }
        }
    }

    $('#files').on("change", function () {
        readURL(this);
    });

    $('#files').on("click", function () {
        $('.thumbnail').parent().remove();
        $('result').hide();
        $(this).val("");
    });

    $('#clear').on("click", function () {
        $('.thumbnail').parent().remove();
        $('#result').hide();
        $('#files').val("");
        $(this).hide();
    });
});


