<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
       protected $fillable = ['name', 'policy','url','ismenu','hiddenname'];
    // use HasFactory;
       //roles belongs to many usergroup
       public function usergroups()
       {
           return $this->belongsToMany(Usergroups::class , 'grouproles' ,'usergroups_id', 'roles_id')->withPivot('isactive');
       }
    }
