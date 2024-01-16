<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;
use Auth;


class CourseController extends Controller
{
    public function list()
    { 
       $data ['getRecord'] = CourseModel::getRecord();
       $data ['header_tite'] = "class List";
       return view('admin.course.list', $data);
    }

    public function create()
    {
        $data ['getRecord'] = CourseModel::getRecord();
        $data ['header_tite'] = "class List";
        return view('admin.course.create', $data);
    } 

    public function insert (Request $request)
    {
        $save = new CourseModel;
       $save->name = $request->name;
       $save->status = $request->status;
       $save->created_by = Auth::user()->id;
       $save->save();
       
       return redirect('admin/course/list')->with('success','Course Created Successfuly');
    }
    
    public function edit($id)
    {
        $data ['getRecord'] = CourseModel::getSingle($id);

          if(!empty($data['getRecord'])) {
            $data ['header_title'] = 'Edit Class';

            return view('admin.course.edit', $data);

          } else {
              abort(404);
          }
    }

    public function update(Request $request)
    {
        $save = new CourseModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('admin/course/list')->with('success','course successfully updated');
    }

    public function delete($id)
    {
        $save = CourseModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

    }
   
}
