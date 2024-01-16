<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExamModel;


class ExamController extends Controller
{
   public function list()
   {

    $data = ExamModel::getRecord();
    $data['header_title'] = 'Exam List';
    return view('admin.Exams.list', $data);
   }
}
