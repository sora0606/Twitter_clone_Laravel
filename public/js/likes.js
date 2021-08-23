//////////////////////////////////////
// いいね用のJavaScript
//////////////////////////////////////

$(function(){
    // いいねが押された時
    $('.js-like').on('click', function() {
        const this_obj = $(this);
        const tweet_id = $(this).data('tweet-id');
        const like_id = $(this).data('like-id');
        const like_count_obj = $(this).parent().find('.js-like-count');
        let like_count = Number(like_count_obj.html());

        if(like_id){
            // いいね！取り消し
            $.ajax({
                url:'like.php',
                type: 'POST',
                data: {
                    'like_id' : like_id
                },
                timeout: 10000
            })
            // 取り消しが成功
            .done(() => {
                // いいね！カウントを減らす
                like_count--;
                like_count_obj.html(like_count);
                this_obj.data('like-id',null);

                // いいねのボタンの色をグレーに
                $(this).find('svg').attr("fill","rgb(126, 126, 126)");
            })
            // いいね！が失敗
            .fail((data) => {
                alert('処理中にエラーが発生しました');
                console.log(data);
            });
        }else{
            // いいね！付与
            $.ajax({
                url:'like.php',
                type: 'POST',
                data: {
                    'tweet_id' : tweet_id
                },
                timeout: 10000
            })
            // いいね！が成功
            .done((data) => {
                // いいね！カウントを増やす
                like_count++;
                like_count_obj.html(like_count);
                this_obj.data('like-id',data['like_id']);

                // いいね！ボタンの色を青に変更
                $(this).find('svg').attr("fill","rgb(224, 36, 94)");
            })
            // いいね！が失敗
            .fail((data) => {
                alert('処理中にエラーが発生しました');
                console.log(data);
            });
        }
    })
})