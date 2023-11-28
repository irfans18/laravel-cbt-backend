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
}
