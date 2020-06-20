<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Result;
use App\Model\Classes;
use App\Model\Subject;
use App\Model\BusRoute;
use App\Model\Student;

use App\Model\PersonalityCheck;
use File;
use Validator;

class ResultController extends Controller
{
    public function __construct(Result $result,Classes $class, Student $student){
    	$this->result = $result;
        $this->class = $class;
        $this->student = $student;
    }

    public function result(){
        $class = $this->class->get();
        return view('result.result')
            ->with('classes',$class)
            ->with('title','Result Section ');
    }

    public function resultClass($id){
        $result = $this->result->where('student_id',$id)->latest()->first();
        $student = $this->student->find($id);

        $data  = $this->class->getSubjects($result->class_id);

         return view('result.result-table')
            ->with('result',$result)
            ->with('student',$student)
            ->with('data',$data)
            ->with('title','Result Section ');
         
    }

    public function addResultInfo(Request $request){
    	//dd($request);
    	//Validation Code//
    	$validate = Validator::make($request->all(),$this->result->getRules());
    	if($validate->fails()){
            $errors =  $validate->messages();
            //dd($errors);
            \Session::flash('error','Problem in adding Result'); 
            return redirect()->back()->with('errors',$errors);
        }
    	//Validation Code//

    	$data = array();
    	$data['student_id'] = $request->student;
        $data['class_id'] = $request->class_id;
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
