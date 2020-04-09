<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
        'content' , 'type' ,'o1' , 'o2' , 'o2' , 'o3','o4' , 'answer' , 'slug'
    ];


}
