<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];
    // protected $table = 'users';
    // protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static function getAdmin()
    {
     $return = self::select('users.*')
        ->where('user_type', '=', 1)
        ->where('is_delete', '=' , 0);
            if(!empty(Request::get('email')))
            {
                $return = $return->where('email','like', '%'. Request::get('email') . '%');
            }

            if(!empty(Request::get('name')))
            {
                $return = $return->where('name','like', '%'. Request::get('name') . '%');
            }

            if(!empty(Request::get('date')))
            {
                $return = $return->whereDate('created_at','=', Request::get('date'));
            }
        $return = $return->orderBy('id','desc')
        ->paginate(20);

        return $return;
    }

    static function getStudent()
    {
     $return = User::select('users.*', 'parent.name as parent_name', 'parent.last_name as parent_last_name')
        ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
        ->where('users.user_type', '=' , 3)
        ->where('users.is_delete', '=' , 0);

        if(!empty(Request::get('name')))
        {
            $return = $return->where('name','like', '%'. Request::get('name') . '%');
        }

        if(!empty(Request::get('email')))
        {
            $return = $return->where('email','like', '%'. Request::get('email') . '%');
        }

        if(!empty(Request::get('date')))
        {
            $return = $return->whereDate('created_at','=', Request::get('date'));
        }

        $return = $return->orderBy('users.id','desc')
        ->paginate(20);

        return $return;
    }

    static function getParent()
    {
        $return = User::select('users.*')
        ->where('users.user_type','=' , 4)
        ->where('users.is_delete','=' , 0);
        if(!empty(Request::get('name')))
        {
            $return = $return->where('name','like', '%'. Request::get('name') . '%');
        }

        if(!empty(Request::get('email')))
        {
            $return = $return->where('email','like', '%'. Request::get('email') . '%');
        }

        if(!empty(Request::get('date')))
        {
            $return = $return->whereDate('created_at','=', Request::get('date'));
        }
        $return = $return->orderBy('id', 'desc')
        
        ->paginate(20);
        return $return;
    }

    static function getTeacher()
    {
       $return = self::select('users.*', )
       ->where('users.user_type','=', 2)
       ->where('users.is_delete','=', 0);

       if(!empty(Request::get('name')))
       {
           $return = $return->where('name','like', '%'. Request::get('name') . '%');
       }

       if(!empty(Request::get('email')))
       {
           $return = $return->where('email','like', '%'. Request::get('email') . '%');
       }

       if(!empty(Request::get('date')))
       {
           $return = $return->whereDate('created_at','=', Request::get('date'));
       }
       $return = $return->orderBy('id', 'desc')
       
       ->paginate(20);


      return $return;
    }

    static public function getSearchStudent()
    {
        if(!empty(Request::get('admission_number')) || !empty(Request::get('name')) || !empty(Request::get('email')))
        {
            $return = self::select('users.*' ,'class.name as class_name', 'parent.name as parent_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
            ->join('class', 'class.id','=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0);
           
            if(!empty(Request::get('admission_number')))
            {
                $return = $return->where('users.admission_number','=', Request::get('admission_number'));
            }

            if(!empty(Request::get('name')))
            {
                $return = $return->where('users.name','=', Request::get('name'));
            }
    
            if(!empty(Request::get('email')))
            {
                $return = $return->where('users.email','=', Request::get('email'));
            }
    
           $return = $return->orderBy('users.admission_number', 'desc')
            ->limit(50)
            ->get();
    
            return $return;
        }
    }

    static public function getMyStudent($parent_id)
    {
        $return = self::select('users.*' ,'class.name as class_name', 'parent.name as parent_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
            ->join('class', 'class.id','=', 'users.class_id')
            ->where('users.user_type', '=', 3)
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.is_delete', '=', 0)
            ->orderBy('users.id', 'desc')
            ->get();
    
            return $return;
    }

    static function getSingle($id) 
    {
        return self::find($id);
    }

  

   static  public function getEmailSingle($email)
   {
    return User::where('email', '=', $email)->first();
    
   }

   static public function getTokenSingle($remember_token) 
    {

     return User::where('remember_token', '=', $remember_token)->first();
    
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }

 }
