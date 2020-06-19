<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['student_id','title','subject_ids','theory_marks','practical_marks','remarks'];

    protected $casts = [
        'subject_ids' => 'array',
        'theory_marks' => 'array',
        'practical_marks' => 'array'
    ];
}
