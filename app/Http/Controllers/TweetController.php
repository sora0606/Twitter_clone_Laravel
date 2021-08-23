<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use FFMpeg;
use Util;

class TweetController extends Controller
{
    /**
     * ツイート作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション処理
        // $this -> validate($request, [
        //     'user_id' => 'required',
        //     'body' => 'max:280',
        // ]);

        if($request -> pictures !== null){


            $pictures = time(). '.' . $request -> pictures -> getClientOriginalName();
            $ext = pathinfo($pictures, PATHINFO_EXTENSION);

            if(preg_match( "/\jpg|\png|\jpeg|\gif|\webp/i", $ext)){


                $request -> file('pictures') -> storeAs('public/img_upload/tweet', $pictures);

                DB::table('tweets') -> insert([
                    'user_id' => Auth::id(),
                    'body' => $request -> body,
                    'image_name' => $pictures,
                    'video_name' => null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            }else{

                $request -> file('pictures') -> storeAs('public/img_upload/tweet', $pictures);

                $pictures = time(). '.' . $request -> pictures -> getClientOriginalName();
                $ext = pathinfo($pictures, PATHINFO_EXTENSION);
                $filename = pathinfo($pictures, PATHINFO_FILENAME);
                $path = 'public/img_upload/tweet/';


                // ファイル変換（mp4にする）
                if (preg_match( "/\avi|\mov/i", $ext )) {

                    $format = new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264');
                    $ffmpeg = FFMpeg::fromDisk('upload')
                    ->open( $path . $pictures)->export()->toDisk('upload')->inFormat($format)
                    ->save( $path . $filename . '.' . 'mp4' );
                    Storage::delete($path . $pictures);

                }


                DB::table('tweets') -> insert([
                    'user_id' => Auth::id(),
                    'body' => $request -> body,
                    'image_name' => null,
                    'video_name' => $filename.'.mp4',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            }

        }else{

            DB::table('tweets') -> insert([
                'user_id' => Auth::id(),
                'body' => $request -> body,
                'image_name' => null,
                'video_name' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }

        return redirect("/home");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
