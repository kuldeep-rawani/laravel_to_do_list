<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task_list extends Model
{
    //
    protected $table='task_list';
    protected $fillable=['id','task'];
}
