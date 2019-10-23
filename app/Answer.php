<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['id','user_id','answer','tema','created_at'];
    public $timestamps = false;
}
