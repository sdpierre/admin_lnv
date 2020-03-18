<?php

namespace App;

use App\Groups;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = "admins";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'email', 'password', 'first_name', 'last_name', 'username',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        $roles = $this->roles;
        if(count($roles)){
            return $roles[0];
        }
        return 0;
    }

    public function roles(){
        return $this->belongsToMany(Groups::class, 'users_groups', 'user_id', 'group_id');
    }

	public function get_redacteurs() {
		return  User::select('admins.id','first_name','last_name','admins.active')
		->join('users_groups','users_groups.user_id','=','admins.id')
		->where('users_groups.group_id',4)
		->where('admins.active',1)
		->orwhere('users_groups.group_id',5)
		->orderBy('first_name','ASC')
		->get();
	}

	public function articles(){
        return $this->hasMany(Article::class, 'auteurid', 'id_article');
    }

 }
