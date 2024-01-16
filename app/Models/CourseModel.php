<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class CourseModel extends Model
{
    use HasFactory;
    protected $table = "course";
    
    static function getRecord()
    {
    
    $return = CourseModel::select('course.*' , 'users.name as created_by_name')

        ->join('users','users.id' , 'course.created_by');

          if(!empty(Request::get('name'))) 
          {
            $return->where('course.name','LIKE', '%'.Request::get('name').'%');
          } 
          else {
            $return->whereDate('course.created_at','LIKE', '%'.Request::get('date').'%');
          }
        
        $return = $return->where('course.is_delete','=', 0)
        ->orderBy('course.id','desc')

        ->paginate(20);

        return $return;

    }

    static function getCourse()
    {
      $return = CourseModel::select('course.*')
      ->join('users','users.id' , 'course.created_by')
      ->where('course.is_delete','=', 0)
      ->where('course.status','=', 0)
      ->orderBy('course.name','asc')
      ->get();

      return $return;
    }

    static function getsingle($id)
    {
        return self::find($id);
    }
     
}