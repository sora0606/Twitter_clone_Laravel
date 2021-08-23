<?php
namespace App\Library;

class Util
{
    /**
     * 画像ファイル名から画像URLを生成
     *
     * @param string $name 画像ファイル名
     * @param string $type ユーザー画像かツイート画像
     * @return string
     */

    public function buildImagePath(string $name = null , string $type)
    {
        if($type === "user" && !isset($name)){
            return  asset('img/user-default.svg');
        }

        return asset('storage/img_upload') . '/' . $type . '/' . htmlspecialchars($name);
    }

    /**
     *指定した日時からどれだけ経過してるかを取得
    *
    * @param string $datetime 日時
    * @return string
    */
    public function convertToDayTimeAgo(string $datetime = null)
    {
        $unix = strtotime($datetime);
        $now = time();
        $diff_sec = $now - $unix;

        if($diff_sec < 60){
            $time = $diff_sec;
            $unit = "秒前";
        }elseif($diff_sec < 3600){
            $time = $diff_sec / 60;
            $unit = "分前";
        }elseif($diff_sec < 86400){
            $time = $diff_sec / 3600;
            $unit = "時間前";
        }elseif($diff_sec < 2764800){
            $time = $diff_sec / 86400;
            $unit = "日前";
        }else{
            if(date('Y') != date('Y',$unix)){
                $time = date("Y年n月j日",$unix);
            }else{
                $time = date("n月j日",$unix);
            }
            return $time;
        }
        return (int)$time.$unit;
    }

    /**
     * 画像アップロード
     *
     * @param array $user
     * @param array $file
     * @param string $type
     * @return string 画像のファイル名
     */
    public function uploadImage(array $user , array $file , string $type)
    {
        // 画像のファイル名から拡張子を取得（例：.png）
        $image_extension = strrchr($file["name"] , '.');

        // 画像のファイル名を作成
        $image_name = $user['id'].'_'.date('YmdHis').$image_extension;

        // 保存先のディレクトリ
        $directory = '../Views/img_uploaded/' . $type . '/';

        // 画像パスの作成
        $image_path = $directory . $image_name;

        // 画像の設置
        move_uploaded_file($file["tmp_name"] , $image_path);

        return $image_name;
    }
}
?>