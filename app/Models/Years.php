<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Years extends Model
{
    protected $fillable = ['name','users_id'];
    // use HasFactory;

     //one year has many topics
     public function topics()
     {
         return $this->hasMany(Topics::class);
     }


     //many sectiontypes managed by one user
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
