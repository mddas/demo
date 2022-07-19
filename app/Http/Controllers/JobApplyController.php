<?php

namespace App\Http\Controllers;
use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function index($slug){
        $datas = JobApply::all();
        return view('admin.job_applied.view')->with(['slug'=>$slug,'datas'=>$datas]);
    }
}
