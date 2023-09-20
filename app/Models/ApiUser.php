<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'email', 
        'first_name', 
        'last_name', 
        'avatar'
    ];

    public $timestamps = false;
}
