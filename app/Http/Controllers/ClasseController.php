<?php

namespace App\Http\Controllers;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        $class=DB::table('classes')->get();
        return response()->json($class);
    }

    public function store(Request $request)
    {
        $validation=$request->validate([
            'class_name'=>'required|unique:classes|max:23'
        ]);

        $data=array();
        $data['class_name']=$request->class_name;
        DB::table('classes')->insert($data);

        return response()->json('done');
    }


    public function update(Request $request, $id)
    {
        $validation=$request->validate([
            'class_name'=>'required|unique:classes|max:23'
        ]);

        $data=array();
        $data['class_name']=$request->class_name;
        DB::table('classes')->where('id',$id)->update($data);
        return response('update success full');
    }

    public function destroy($id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return response()->json('delete success full');
    }
}
