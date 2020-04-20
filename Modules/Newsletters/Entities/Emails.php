<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = "newsletters_email";

    protected $fillable = [
        'id', 'email',
    ];
}
