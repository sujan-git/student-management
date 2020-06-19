<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject','subject_code','status','full_marks_theory','full_marks_practical','pass_marks_theory','pass_marks_practical'];


     public function classes(){
    	return $this->belongsToMany('App\Model\Classes');
    }

    public function getSubjectByClass($id){
    	return $this->with('subjects')->get();
    }
}
