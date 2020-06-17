<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Subject;

class Classes extends Model
{
    //
    protected $fillable = ['name','status'];

    public function subjects(){
    	return $this->belongsToMany('App\Models\Subject');
    }

    public function getSubjectByClass(){
    	//
    }
}
