<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouprole extends Model
{
    protected $fillable =['roles_id ','usergroups_id'];

    // use HasFactory;
}
