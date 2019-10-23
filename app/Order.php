<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id','tema','messages','name','email','files','created_at	'];
    public $timestamps = false;
}
