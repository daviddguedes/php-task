<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        "image", "first_name", "last_name", "phone", "email", "user_id"
    ];
}
