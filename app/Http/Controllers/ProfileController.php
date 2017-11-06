<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\User_;
use App\DataUser;
use App\Friend;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = DataUser::where('user_id',Auth::user()->id)->get();
        $following = Friend::where('follower_id', Auth::user()->id)->count();
        $followers = Friend::where('user_id', Auth::user()->id)->count();
    
        return view('profile',['data' => $data, 'following'=> $following, 'followers'=> $followers]);
    }

    public function showEditForm($id){
        $data = DataUser::find($id);
        return view('editprofile',['data' => $data]);
    }

    public function edit(Request $request){

        DB::beginTransaction();
        
        try{
            $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'min:6',
            ]);

            $edit = User_::find($request->id);
            
            $edit->name = $request->name;
            $edit->email = $request->email;
            if(!empty($request->password)){
                $edit->password = bcrypt($request->password);
            }
            $edit->save();
            
            $Data = DataUser::where('user_id', $request->id)->first();
            $Data->bio = $request->bio;
            $Data->save();

           
            DB::commit();
            return redirect("/profile");

        }catch(\Exception $e){
            DB::rollBack();
            return redirect("/profile");
        }   
    }

    public function showUploadForm($id){
        $data = DataUser::find($id);
        return view('upload',['data' => $data]);
    }

    public function upload(Request $request){
        DB::beginTransaction();
        
        try{
            $this->validate($request,[
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/');
            $image->move($destinationPath, $input['imagename']);

            $Data = DataUser::where('user_id', $request->id)->first();
            $Data->image = '/assets/images/'.$input['imagename'];
            $Data->save();

            DB::commit();
            return redirect("/profile");

        }catch(\Exception $e){
            DB::rollBack();
            return redirect("/profile");

        }   

    }
}