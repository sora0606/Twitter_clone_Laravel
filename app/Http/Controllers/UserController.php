<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Library\Util;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログインしたアカウントの情報を取得
        $user = Auth::user();

        //ツイートの情報を全て取得
        $users_tweets =  DB::table('tweets as T')
                            ->select(DB::raw('T.id as tweet_id, T.status as tweet_status, T.body as tweet_body, T.image_name as tweet_img, T.video_name as tweet_mov, T.created_at as tweet_created_at, U.id as user_id, U.nickname as user_nickname, U.name as user_name, U.file_name as user_icon, L.id as like_id'))
                            ->where('T.status', 'active')
                            ->Join('users as U', 'U.id', '=', 'T.user_id')
                            ->where('U.status', 'active')
                            ->leftJoin('likes as L', 'L.tweet_id', '=', 'T.id')
                            ->orderByDESC('T.created_at')
                            ->get();

        if($user){
            $date = $user -> file_name;
            $func = new Util;
            $user->file_name = $func -> buildImagePath($date, 'user');
        }

        foreach($users_tweets as $user_tweet){
            $date = $user_tweet -> user_icon;
            $func = new Util;
            $user_tweet -> user_icon = $func -> buildImagePath($date, 'user');
        }

        foreach($users_tweets as $user_tweet){
            $date = $user_tweet -> tweet_created_at;
            $func = new Util;
            $user_tweet->tweet_created_at = $func -> convertToDayTimeAgo($date);
        }

        return view('home', compact('user', 'users_tweets'));
    }

    /**
     * アカウントを作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション処理
        $this -> validate($request, [
            'nickname' => 'required|max:50',
            'name' => 'required|max:50',
            'email' => 'required|max:255',
            'password' => 'required|max:128',
        ]);

        //登録処理
        DB::table('users') -> insert([
            'nickname' => $request -> nickname,
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect("/login");

    }

    /**
     * ログイン機能
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        // バリデーション処理
        $this -> validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|max:128',
        ]);

        if(Auth::attempt(['email' => $request -> input('email'), 'password' => $request -> input('password')])){
            return redirect('home');
        }else{
            return view('auth.login');
        }

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
