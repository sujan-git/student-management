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
use PDF;

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
            ->with('title','Result Section | Add Entry');
         
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
      $action = "Add";
      if($request->id){
        $action = "update";
        
      }else{
        $data = array();
        $data['student_id'] = $request->student;
        $data['class_id'] = $request->class_id;
        $data['subject_ids'] = ($request->subject_id);
        $data['theory_marks'] = ($request->theory_marks);
        $data['practical_marks'] = ($request->practical_marks);
       
      }	
       $this->result->fill($data);
    	$succ = $this->result->save();
    	if($succ){
    		 $request->session()->flash('success', 'Student Result '.$action.'ed Successfully');
    	}else{
    		 $request->session()->flash('error', 'Failed To '.$action.' Result At This Moment');
    	}
    	return redirect()->back();
    }

    public function updateResultInfo(Request $request){
      //Validation Code//
          $validate = Validator::make($request->all(),$this->result->getRules());
          if($validate->fails()){
                $errors =  $validate->messages();
                //dd($errors);
                \Session::flash('error','Problem in adding Result'); 
                return redirect()->back()->with('errors',$errors);
            }
          $result = $this->result->where('student_id',$request->id)->latest()->first();
          $action = "Update";
         // dd($request->subject_id[2]);
          $result->student_id = $request->student;
          $result->class_id = $request->class_id;
          for($i= 0; $i<count( $request->subject_id);$i++){
            $subject_ids[$i] = $request->subject_id[$i];
            $theory_marks[$i] = $request->theory_marks[$i];
            $practical_marks[$i] = $request->practical_marks[$i];
          }
          $result->subject_ids = $subject_ids;
          $result->theory_marks = $theory_marks;
          $result->practical_marks = $practical_marks;
          //dd($result);
          $succ = $result->save();
          if($succ){
            $request->session()->flash('success', 'Student Result '.$action.'ed Successfully');
        }else{
           $request->session()->flash('error', 'Failed To '.$action.' Result At This Moment');
        }
        return redirect()->back();
    }

    public function editResultInfo($id){
      $result = $this->result->where('student_id',$id)->latest()->first();
      $stdnt = $this->student->find($id);
      $data  = $this->class->getSubjects($stdnt->class_level);
      $students = $this->student->where('class_level',$stdnt->class_level)->get();
      $class_id = $stdnt->class_level;
      return view('school.result')
            ->with('result',$result)
            ->with('students',$students)
            ->with('subjects',$data)
            ->with('stdnt',$stdnt)
            ->with('class_id',$id)
            ->with('title','Result Section | Edit Entry');
    }

    

    public function resultPDF($id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->resultHtml($id));
        return $pdf->stream();
    }

    public function resultHtml($id){
        $result = $this->result->where('student_id',$id)->latest()->first();
        $student = $this->student->find($id);
        $data  = $this->class->getSubjects($result->class_id);
        $output = '<h2 style="text-align: center">School Name</h2>
                    <h3 style="text-align: center">Result Title</h3>
                    <h5>Student Name: '.$student->student_name.'</h5>
                    <h5>'.$data->name.'</h5>
                    <h5>Roll No:'.$student->roll_no.'</h5>';

        $output .=   '<table style="border-collapse: collapse; border: 0px;"><thead><tr>
                              
                              <th style="border: 1px solid">Subject Name</th>
                              <th style="border: 1px solid">Full Marks(Th)</th>
                              <th style="border: 1px solid">Full Marks(Pr)</th>';
                              if($result){
                                $output .= '<th style="border: 1px solid">Obtained Marks(Th)</th><th style="border: 1px solid">Obtained Marks(Pr)</th>';
                              }
                              
                              
        
                  $output .= '<th style="border: 1px solid"scope="col">Status</th></tr></thead>';
               
                $theory_marks = array();$practical_marks = array();$total_marks = 0;$percent = 0;$full_marks = 0;$final_result=true;

                 $output .= '<tbody>';
                        if($data->subjects){
                            foreach($data->subjects as $key=>$subject){
                                if($result->subject_ids){
                                  for($i=0; $i<count($result->subject_ids);$i++){
                                        if($subject->id == $result->subject_ids[$i]){
                                         $theory_marks[] = $result->theory_marks[$i];
                                         $practical_marks[] = $result->practical_marks[$i];
                                         }
                                    }  
                                }
                                $output .= '<tr>
                              
                              <td style="border: 1px solid">'.$subject->subject.'</td>
                              <td style="border: 1px solid"> '.$subject->full_marks_theory.'</td>
                              <td style="border: 1px solid">'.$subject->full_marks_practical.'</td>
                              <td style="border: 1px solid">'.$theory_marks[$key].'</td>
                              <td style="border: 1px solid">'.$practical_marks[$key].'</td>';
                              $status = array();
                              if($practical_marks[$key] >= $subject->pass_marks_practical && $theory_marks[$key] >= $subject->pass_marks_theory){
                                            $status[$key]= 'PASS';
                                  if($final_result){
                                    $final_result= true;
                                  }

                              }else{
                                $status[$key]= 'FAIL';
                                  if($final_result){
                                    $final_result= false;
                                  }
                              }
                              $output.= '<td style="border: 1px solid">'.$status[$key].'</td>';
                              $output .= '</tr>';
                              $total_marks += $theory_marks[$key] + $practical_marks[$key];
                            $full_marks += $subject->full_marks_practical + $subject->full_marks_theory;
                            }
                            
                            $output .= '</table>';
                        }
        $output .= '<h5>Full Marks: '.$full_marks.'</h5>
                    <h5>Total Marks Obtained: '.$total_marks.'</h5>';
        if($final_result){
            $output .='
                  <h5>Percent:'.number_format(($total_marks*100)/$full_marks,2).'%'.'</h5>';
        }else{
            $output .= '<h5>Percent:</h5>';
        }
        if($final_result){
            $output .= '<h5>Status: PASS</h5>';
        }else{
            $output .= '<h5>Status: FAIL</h5>';
        }

        return $output;
        
    }
}
