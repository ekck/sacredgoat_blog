<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    //
    protected $fillable = ['paragraph','blog_id'];

    protected $hidden = [];
}
