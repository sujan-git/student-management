<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Subject;

class Classes extends Model
{
    //
    protected $fillable = ['name','status'];

    public function subjects(){
    	return $this->belongsToMany('App\Model\Subject','class_subjects','class_id','subject_id');
    }

    public function getSubjects($id){
    	return $this->with('subjects')->find($id);
    }
}
