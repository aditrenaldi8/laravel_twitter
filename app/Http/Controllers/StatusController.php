<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Status;


class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add(Request $request){
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'status' => 'required|max:255',
            ]);
            
            $new = new Status;
            $new->status = $request->status;
            $new->user_id = Auth::user()->id;
            $new->save();
                
            DB::commit();
            return redirect("/home");

        }catch(\Exception $e){
            DB::rollBack();
            return redirect("/home");
        }
    }

    public function delete(Request $request){
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'id' => 'required',
            ]);
            
            $data = Status::find($request->id);
            $data->delete();
                
            DB::commit();
            return redirect("/home");

        }catch(\Exception $e){
            DB::rollBack();
            return redirect("/home");
        }
    }
}
