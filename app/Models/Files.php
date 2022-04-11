<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['name', 'extension', 'titles_id', 'filetypes_id','users_id'];
    // use HasFactory;

    //file belongs to filetypes
    public function filetype()
    {
        return $this->belongsTo(Filetypes::class,'filetypes_id');
    }
     //file belongs to titles
     public function title()
     {
         return $this->belongsTo(Titles::class,'titles_id');
     }
     public function user()
     {
         return $this->belongsTo(User::class,'users_id');
     }

}
