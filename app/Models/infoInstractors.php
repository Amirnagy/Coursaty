<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoInstractors extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'education',
        'certifications',
        'experience',
        'skills'
    ];


    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
