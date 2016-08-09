<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    //
    protected $table = 'list';
     protected $fillable = ['First_Name', 'Last_Name', 'user_id'];

    
}

