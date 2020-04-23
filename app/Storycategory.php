<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storycategory extends Model
{
    protected $table = 'storycategory';

    protected $fillable = ['blog_id','category_id'];

    protected $hidden = [];
}
