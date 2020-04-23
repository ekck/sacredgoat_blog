<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = ['document', 'blog_id'];

    protected $hidden = [];
}
