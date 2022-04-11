<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carousel extends Model
{
    protected $table ="carousel";
    protected $fillable = ['title','subtitle','link','ordr','users_id','extension'];
    // use HasFactory;
    //one color for each sectiontype
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
