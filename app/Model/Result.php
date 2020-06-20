<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['student_id','title','subject_ids','theory_marks','practical_marks','remarks','class_id'];

    protected $casts = [
        'subject_ids' => 'array',
        'theory_marks' => 'array',
        'practical_marks' => 'array',
    ];

    public function getRules(){
    	return [
    		'student'=>'required|integer|exists:students,id',
    		'subject_id.*'=>'required|integer|exists:subjects,id',
            'class_id'=>'required|integer|exists:classes,id',
    		'theory_marks.*'=>'required|numeric|max:100',
    		'practical_marks.*'=>'required|numeric|max:25',
    	];
    }
}
