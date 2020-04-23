<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $table = 'gallery';

    protected $fillable = ['blog_id','image'];

    protected $hidden = [];
}
