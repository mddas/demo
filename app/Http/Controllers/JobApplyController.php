<?php

namespace App\Http\Controllers;
use App\Models\JobApply;
use Illuminate\Http\Request;
use Session;

class JobApplyController extends Controller
{
    public function index($slug){
        $datas = JobApply::all();
        return view('admin.job_applied.view')->with(['slug'=>$slug,'datas'=>$datas]);
    }
    public function jobstore(Request $req){
         //return $req;
         $validated = $req->validate([
            'name' => 'required',
            'message' => 'required',
            'skill' => 'required',
            'file'=>'required',
          ]);
          
          if($req->file('file')){
            $file= $req->file('file');
            $name = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('job'), $name);
          }
          else{
              $name = null;
          }
        $jobapply = JobApply::updateOrCreate(
            ['id' => $req['id']],
            [
            'name'=>$req['name'],
            'skill'=>$req['skill'],
            'message'=>$req['message'],
            "file"=>'/job/'.$name,
        ]);
        if($jobapply){
            Session::flash('insertMessage', 'Inserted successfully!');
            return redirect(route('jobs','view-jobs'));
        }
    }
    public function destroy($slug){
        JobApply::find($slug)->delete();
        return redirect(route('jobs','view-jobs'));
    }
}
