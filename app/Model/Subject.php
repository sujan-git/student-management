<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject','subject_code','status','full_marks_theory','full_marks_practical','pass_marks_theory','pass_marks_practical'];


     public function subjects(){
    	return $this->belongsToMany('App\Model\ClassSubject', 'subject_id');
    }

    public function getSubjectByClass($id){
    	return $this->with('subjects')->get();
    }
}
