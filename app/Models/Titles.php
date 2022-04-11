<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titles extends Model
{
    protected $fillable =['name', 'ordr', 'descr', 'topics_id', 'keywords','users_id', 'downloads','watches'];
    // use HasFactory;

    //many titles belongs to one topic
    public function topic()
    {
        return $this->belongsTo(Topics::class,"topics_id");
    }

    //many titles managed by user
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function files(){

        return $this->hasMany(Files::class);
    }

    public function file()
    {
        return $this->belongsToMany(Filetypes::class ,'files','titles_id','filetypes_id')->withPivot('name','extension');
    }


}
