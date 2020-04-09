<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Replies
 * @package App\Models
 * @property string $content
 * @property string $point
 */
class Replies extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'exam_id' , 'student_id' ,'content' , 'point'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
