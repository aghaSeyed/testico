<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @package App\Models
 * @property string $o1
 * @property string $o2
 * @property string $o3
 * @property string $o4
 * @property string $answer
 * @property string $slug
 * @property string $content
 */
class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
        'content' , 'type' ,'o1' , 'o2' , 'o2' , 'o3','o4' , 'answer' , 'slug' , 'image'
    ];


}
