<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Auth;
use App\Models\CourseModel;
use App\Models\ClassModel;

class ClassSubjectController extends Controller
{
   public function list()
   {

    $data ['getRecord'] = ClassSubjectModel::getRecord();
    $data ['header_title'] = 'subject class list';
    return view ('admin.assign_subject.list', $data );

   }

   public function create(Request $request)
   {
    $data ['getClass'] = ClassModel::getClass();
    $data ['getCourse'] = CourseModel::getCourse();
    $data['header_title'] = 'Add Assig Suject';
    return view ('admin.assign_subject.create', $data );
   }

   public function insert(Request $request)
   {
      if(!empty($request->course_id))
      {
         foreach ($request->course_id as $course_id) {

            $getAlreadyFirst =ClassSubjectModel::getAlreadyFirst($request->class_id, $request->course_id);

            if(!empty($getAlreadyFirst))
            {
               $getAlreadyFirst->status = $request->status;
               $getAlreadyFirst->save();
            } 
            else
            {
              

            $save = new ClassSubjectModel();
            $save->class_id = $request->class_id;
            $save->course_id = $course_id; // Use $courseId from the loop, not $request->course_id
            $save->status = $request->status;
            $save->created_by = Auth::user()->id;
            $save->save();
            }

        }

        return redirect('/admin/assign_subject/list')->with('success','Subject Successfully assigned To Class');
        
      }
      else
      {
        return redirect()->back()->with('error','Error occured please try again');
      }
   }

   public function edit($id)
   {
      $data['getRecord'] = ClassSubjectModel::find($id);
      $data['getCourse'] = CourseModel::get();
      $data['header_title'] = "Edit assigned_subjects";
      return view('/admin/assign_subject/edit' , $data );
   }

    public function update(Request $request, $id)
   {
      $save = ClassSubjectModel::getSingle($id);
      $save->course_id = $request->course_id;
      $save->class_id = $request->class_id;
      $save->status = $request->status;
      $save->created_by = Auth::user()->id;
      $save->save();

      return redirect('/admin/assign_subject/lits')->with('success', 'Edited and Assigned to class');

   }

   public function edit_single($id)
   {
     $data['getSingle'] = ClassSubjectModel::getSingle($id);
     return view('/admin/assign_subject/edit_single', $data);
   }
}