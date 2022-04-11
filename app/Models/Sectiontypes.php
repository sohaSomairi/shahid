<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectiontypes extends Model
{
    protected $fillable =['name','colors_id','users_id'];

    // use HasFactory;
    //sectiontype has one color
    public function color()
    {
        return $this->belongsTo(Colors::class,'colors_id');
    }

    //many sectiontypes managed by one user
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    //sectiontype has many sections
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

}
