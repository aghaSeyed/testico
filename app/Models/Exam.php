<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exam
 * @package App\Models
 * @property string $name
 * @property string $description
 * @property string $questions
 * @property string $type
 * type==0 testi
 * type==1 tashrihi
 */
class Exam extends Model
{
    protected $fillable = [
        'room_id' ,'teacher_id' ,'name', 'description','questions' , 'type', ' start' , 'end' , 'time' , 'number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(){
        return $this->hasMany(Replies::class);
    }

}
