<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filetypes extends Model
{
    protected $fillable = ['name' , 'extension' , 'users_id'];
    // use HasFactory;
       //filetype has many files
       public function title()
       {
           return $this->belongsToMany(Titles::class ,'files','filetypes_id','titles_id')->withPivot('name','extension');
       }

       public function user()
       {
           return $this->belongsTo(User::class,'users_id');
        }
        public function files(){
           return $this->hasMany(Files::class);
       }
}
