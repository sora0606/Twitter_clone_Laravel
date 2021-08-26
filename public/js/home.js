$(function () {

    //ファイル選択時の処理
    $('textarea').after('<span class="pictures-chack"></span>');

    if ($("input[type=file]").val().length == 0) {
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

    // アップロードするファイルを選択
    $('input[type=file]').on('change', function () {
        var file = $(this).prop('files');

        var img_count = 1;
        $(file).each(function (i) {
            // 5枚まで
            if (img_count > 5) {
                return false;
            }

            if (file[i].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function () {
                    var pictures_src = $('<img>').attr('src', reader.result);
                    $('.pictures-chack').append('<span id="delete_btn"></span>', pictures_src);
                }
            } else {
                var reader = new FileReader();
                reader.onload = function () {
                    var pictures_src = $('<video loop controls muted playsinline preload="metadata" autoPictureInPicture>').attr('src', reader.result);
                    $('.pictures-chack').append('<span id="delete_btn"></span>', pictures_src);
                }
            }

            reader.readAsDataURL(file[i]);

            img_count = img_count + 1;
        });
    });

    $('#delete_btn').on('click', function(){
        
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

});
