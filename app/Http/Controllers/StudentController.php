<?php

namespace App\Http\Controllers;
// use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index()
    {

        //eloquent used
       // $std=Student::all();
        //query builder used
        $std=DB::table('students')->get();
        return response()->json($std);
    }

    public function store(Request $request)
    {

        $validation=$request->validate([
            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required|max:25',
            'phone'=>'max:11',
            'email'=>'email',
            
        ]);

        // query builder
        // $data=array();
        // $data['name']=$request->class_id;
        // $data['section_id']=$request->section_id;
        // $data['name']=$request->name;
        // $data['phone']=$request->phone;
        // $data['email']=$request->email;
        // $data['password']=$request->password;
        // $data['photo']=$request->photo;
        // $data['address']=$request->address;
        // $data['gender']=$request->gender;
        // DB::table('students')->insert($data);
        // return response()->json('data add done');

        //eloquent used
        $std= new Student();
        $std->class_id=$request->class_id;
        $std->section_id=$request->section_id;
        $std->name=$request->name;
        $std->phone=$request->phone;
        $std->email=$request->email;
        $std->password=$request->password;
        $std->photo=$request->photo;
        $std->address=$request->address;
        $std->gender=$request->gender;
        $std->save();
        $messages="Student data Add success full";
        return response()->json($messages);
        
    }

    public function show($id)
    {
        // $data=Student::findorfail($id);
        // return $data;
        //query builder
       $data=DB::table('students')->where('id',$id)->first();
       return response()->json($data);
    
    }

    public function update(Request $request, $id)
    {
        $validation=$request->validate([
            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required|max:25',
            'phone'=>'max:11',
            'email'=>'email',
            
        ]);
        

        $data=array();
        $data['name']=$request->class_id;
        $data['section_id']=$request->section_id;
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['photo']=$request->photo;
        $data['address']=$request->address;
        $data['gender']=$request->gender;
        DB::table('students')->where('id',$id)->update($data);
        return response()->json('Data success fully update');
              
    }

    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return response()->json('data success fully delete');
    }
}
