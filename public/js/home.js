$(function () {
    //ファイル選択時の処理
    $('textarea').after('<span class="pictures-chack"></span>');


    if ($("input[type=file]").val() == "") {
        $(".btn-tweet").prop("disabled", true);
        $('.btn-tweet').css('background-color', '#1da1f2');
        $('.btn-tweet').css('opacity', '0.5');
        $('.btn-tweet').css('pointer-events', 'none');
    }

    $("input[type=file]").on("keydown keyup keypress change", function () {
        if ($(this).val().length > 0) {
            $(".btn-tweet").prop("disabled", false);
            $('.btn-tweet').css('background-color', '#1da1f2');
            $('.btn-tweet').css('opacity', '1');
            $('.btn-tweet').css('pointer-events', 'all');
        } else {
            $(".btn-tweet").prop("disabled", true);
            $('.btn-tweet').css('background-color', '#1da1f2');
            $('.btn-tweet').css('opacity', '0.5');
            $('.btn-tweet').css('pointer-events', 'none');
        }
    });

    var img_count = 0;
    // アップロードするファイルを選択
    $('input[type=file]').on('change', function () {

        var file = $(this).prop('files');

        $(file).each(function (i) {

            if (file[i].type.match('image.*')) {

                var reader = new FileReader();

                reader.onload = function () {

                    img_count = img_count + 1;

                    // ４枚まで
                    if (img_count > 4) {
                        return false;
                    }

                    var pictures_src = $('<img>').attr('src', reader.result);
                    $('.pictures-chack').append('<span id="delete_btn"' + 'class="' + img_count + '"></span>', pictures_src);

                }

            } else {
                var reader = new FileReader();
                reader.onload = function () {
                    var pictures_src = $('<video loop controls muted playsinline preload="metadata" autoPictureInPicture>').attr('src', reader.result);
                    $('.pictures-chack').append('<span id="delete_btn"></span>', pictures_src);
                }
            }

            reader.readAsDataURL(file[i]);

        });
    });

    $(document).on('click', '#delete_btn', function() {
        var target = $('#delete_btn').attr('class');

        $('.pictures-chack').remove();
        $('input[type="file"]').val("");
        if ($("input[type=file]").val() == "") {
            $(".btn-tweet").prop("disabled", true);
            $('.btn-tweet').css('background-color', '#1da1f2');
            $('.btn-tweet').css('opacity', '0.5');
            $('.btn-tweet').css('pointer-events', 'none');
        }

        img_count = 0;

        //ファイル選択時の処理
        $('textarea').after('<span class="pictures-chack"></span>');

    });

    //textareaの処理（文字が入力された時のイベント）
    if ($("#body").val().length == 0) {
        $(".btn-tweet").prop("disabled", true);
        $('.btn-tweet').css('background-color', '#1da1f2');
        $('.btn-tweet').css('opacity', '0.5');
        $('.btn-tweet').css('pointer-events', 'none');
    }
    $("#body").on("keydown keyup keypress change", function () {
        if ($(this).val().length > 0) {
            $(".btn-tweet").prop("disabled", false);
            $('.btn-tweet').css('opacity', '1');
            $('.btn-tweet').css('pointer-events', 'all');
        } else {
            $(".btn-tweet").prop("disabled", true);
            $('.btn-tweet').css('opacity', '0.5');
            $('.btn-tweet').css('pointer-events', 'none');
        }
    });

});
