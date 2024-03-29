<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $fillable = ['applicant_id', 'exam_name', 'university', 'board', 'result'];
}
