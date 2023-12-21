<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'score_numeric',
      'score_verbal',
      'score_logic',
      'status_numeric',
      'status_verbal',
      'status_logic',
      'timer_numeric',
      'timer_verbal',
      'timer_logic',
      'result',
   ];
}
