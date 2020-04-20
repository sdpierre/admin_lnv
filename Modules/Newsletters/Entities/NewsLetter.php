<?php

namespace App;

namespace Modules\Newsletters\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $table = "newsletters";

    protected $fillable = [
        'title', 'url', 'caption', 'description', 'photo', 'date', 'active',
    ];
}
