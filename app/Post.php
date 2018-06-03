<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // lets laravel know it's ok to create/store data in database

    protected $fillable = [

        'title',
        'body'

    ];

}
