<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usergroups extends Model
{
    protected $fillable =['name','users_id'];

    // use HasFactory;

    //usergroup has many roles
    public function roles()
    {
        return $this->belongsToMany(Roles::class , 'grouproles' , 'usergroups_id','roles_id')->withPivot('isactive');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
