<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    protected $fillable =[ 'name', 'sections_id', 'descr', 'ordr', 'users_id','keywords', 'years_id' ,'posterurl'];
    // use HasFactory;
    //many topics belongs to one year
    public function year()
    {
        return $this->belongsTo(Years::class,'years_id');
    }
    public function section()
    {
        return $this->belongsTo(Sections::class,'sections_id');
    }

    //one topic has many titles
    public function titles()
    {
        return $this->hasMany(Titles::class);
    }

    //many topics managed by one user
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

}
