<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($slug){
        $datas = User::all();
        return view('admin.user.view')->with(['slug'=>$slug,'datas'=>$datas]);
    }
    public function destroy($slug){
        User::find($slug)->delete();
       return redirect(route('user','view-users'));
    }
}
