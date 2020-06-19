<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Result;

class ResultController extends Controller
{
    public function __construct(Result $result){
    	$this->result = $result;
    }

    public function addResultInfo(Request $request){
    	//Validation Code Remaining//
    	$data = array();
    	$data['student_id'] = $request->student;
    	$data['subject_ids'] = ($request->subject_id);
    	$data['theory_marks'] = ($request->theory_marks);
    	$data['practical_marks'] = ($request->practical_marks);

    	$this->result->fill($data);
    	$succ = $this->result->save();
    	if($succ){
    		 $request->session()->flash('success', 'Student Result Added Successfully');
    	}else{
    		 $request->session()->flash('error', 'Failed To Add Result At This Moment');
    	}
    	return redirect()->back();
    }

    public function getResult($id){
    	$result = $this->result->where('student_id',$id)->first();
    	if($result){
    		$total_marks = 0;
    		for($i=0; $i<count($result->theory_marks);$i++){
    			$total_marks += $result->theory_marks[$i];
    		}
    		dd($total_marks);

    	}
    }
}
