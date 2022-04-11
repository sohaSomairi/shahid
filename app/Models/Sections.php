<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $fillable =['name', 'ordr', 'ismain', 'sections_id', 'years_id', 'sectiontypes_id','users_id'];
    // use HasFactory;
    //many sections belongs to one sectiontype
    public function sectiontype()
    {
        return $this->belongsTo(Sections::class);
    }
    //many sections managed by one user
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    //recursive relationship
    public function subsections()
    {
        return $this->hasMany(Sections::class, 'sections_id','id');
    }
}
