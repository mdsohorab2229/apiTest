<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $subject=Subject::all();
        return response()->json($subject);
    }

    public function store(Request $request)
    {
        $validation=$request->validate([
            'class_id'=>'required',
            'subject_name'=>'required|max:25',
            'subject_code'=>'required'
        ]);
        $sub= new Subject();
        $data=[
            'class_id'=>$request->class_id,
            'subject_name'=>$request->subject_name,
            'subject_code'=>$request->subject_code
        ];
        
            DB::table('subjects')->insert($data);
        // $subject=Subject::create($request->all());
        $messages="subject create success full";
        return response()->json($messages);
    }

    public function show($id)
    {
      $sub=Subject::findorfail($id);
      return response()->json($sub);
    }

    public function update(Request $request, $id)
    {
        $validation=$request->validate([
            'class_id'=>'required',
            'subject_name'=>'required|max:25',
            'subject_code'=>'required'
        ]);
        $subject=Subject::findorfail($id);
        $subject->update($request->all());
        $messages="subject update success full";
        return response()->json($messages);
    }
    public function destroy($id)
    {
        $img=DB::table('students')->where('id',$id)->first();
        $image_path=$img->photo;

        unlink($image_path);
        DB::table('students')->where('id',$id)->delete();
        // Subject::where('id',$id)->delete();
        return response()->json('data delete');
    }

}
