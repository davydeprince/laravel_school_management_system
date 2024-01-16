<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;
class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = 'class_subject';

    static public function  getRecord()
    {
      return ClassSubjectModel::select('class_subject.*' , 'class.name as class_name' , 'course.name as course_name' , 'users.name as created_by_name')
            ->join('course','course.id','=','class_subject.course_id')
            ->join('class','class.id','=','class_subject.class_id')
            ->join('users','users.id','=','class_subject.created_by')
            ->orderBy('class_id' , 'desc')
            ->paginate(20);

   
    }

    static function getAlreadyFirst($class_id, $course_id)
    {
       return self::where('class_id', '=',  $class_id)->where('course_id', '=',  $course_id)->first();
    }

  static public function getSingle($id)
  {
    return self::where('id', '=', $id)->first();
  }
}
