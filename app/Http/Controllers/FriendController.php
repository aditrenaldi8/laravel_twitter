<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Friend;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followers(){    	
    	$data = DB::select(
            'SELECT * FROM friends f 
                JOIN users u ON f.follower_id = u.id
                JOIN data_users d ON d.user_id = u.id 
                WHERE f.user_id = ? ORDER BY u.name ASC', [Auth::user()->id]);

    	return view('followers',['followers' => $data]); 
    }

    public function following(){
    	$data = DB::select(
            'SELECT * FROM friends f 
                JOIN users u ON f.user_id = u.id
                JOIN data_users d ON d.user_id = u.id 
                WHERE f.follower_id = ? ORDER BY u.name ASC', [Auth::user()->id]);

    	return view('following',['following'=>$data]); 
    }

    public function people(){
    	$data = DB::select('SELECT * FROM data_users d
                JOIN users u ON d.user_id = u.id 
       			WHERE d.user_id not in (SELECT user_id FROM friends WHERE follower_id = ?)
                AND d.user_id <> ?
                ORDER BY u.name ASC', [Auth::user()->id, Auth::user()->id]);

    	return view('people',['people'=>$data]); 
    }

    public function addFriend(Request $request){

        DB::beginTransaction();
        try{
            $this->validate($request, [
                'id' => 'required',
            ]);
            
            $new = new Friend;
            $new->follower_id = Auth::user()->id;
            $new->user_id = $request->id;
            $new->save();
                
            DB::commit();
            return redirect("/people");

        }catch(\Exception $e){
            DB::rollBack();
            return redirect("/people");
        }
    }

    public function delete(Request $request){

        DB::beginTransaction();
        try{
            $this->validate($request, [
                'id' => 'required',
            ]);
            
            $data = Friend::where('user_id', $request->id)->first();
            $data->delete();
                
            DB::commit();
            return redirect("/following");

        }catch(\Exception $e){
            DB::rollBack();
            return redirect("/following");
        }
    }
}
