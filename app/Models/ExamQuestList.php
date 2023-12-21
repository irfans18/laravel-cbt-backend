<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestList extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'question_id',
        'is_correct',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
