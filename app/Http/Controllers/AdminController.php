<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($slug){
        return view('admin.index')->with(['slug'=>$slug]);
    }
    public function tempindex(){
        return view('admin.index');
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
  
}
