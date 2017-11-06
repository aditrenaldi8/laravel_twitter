<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkUser = DB::select('select * from data_users WHERE user_id = ?', [Auth::user()->id]);

        if(empty($checkUser)){
            $new = new DataUser;
            $new->user_id = Auth::user()->id;
            $new->save();
        }

        $data = DB::select(
            'SELECT * FROM statuses s 
                JOIN users u ON s.user_id = u.id 
                WHERE s.user_id in (SELECT user_id FROM friends WHERE follower_id = ?) OR user_id = ? ORDER BY s.id DESC', [Auth::user()->id, Auth::user()->id]);

        return view('home',['status' => $data]);
    }
}
