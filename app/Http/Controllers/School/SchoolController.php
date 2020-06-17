<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Classes;
use App\Model\Subject;
use App\Model\BusRoute;
use App\Model\Student;
use App\Model\Result;
use App\Model\PersonalityCheck;
use File;
use Validator;

class SchoolController extends Controller
{
    public function __construct(Classes $class,BusRoute $bus,Subject $subject,Student $student){
    	$this->class = $class;
    	$this->bus = $bus;
        $this->subject = $subject;
    	$this->student = $student;
    }

    public function index(Request $request){
    	return view('school.index')
    		->with('title','Welcome |Adminstrator');
    }

    public function studentInfo(Request $request){
    	$class = $this->class->get();
        //dd($class);
    	$route = $this->bus->get();
    	return view('school.studentinfo')
    		->with('class',$class)
            ->with('classes',$class)
    		->with('bus',$route)
            //->with('student',null)
    		->with('title','Student Information | Adminstrator');
    }

    public function viewStudentInfo($id){

    }


    public function listStudentInfo(Request $request){
        $classes = $this->class->get();
        return view('school.liststudent')
            ->with('classes',$classes);
    }

    public function getStudentByClass($id){
       $student = $this->student->where('class_level',$id)->get();
       $class_name = ($this->class->where('id',$id)->first())->name;
       //dd($class_name);
       if($student){

         return response()->json(['status'=>true,  'data' =>$student, 'class'=>$class_name]);
       }
       else{
         return response()->json(['status'=>false,  'data' =>$student]);
       }
    }

    public function editStudentInfo($id){
        $class = $this->class->get();
        $route = $this->bus->get();
        $student = $this->student->findOrFail($id);
        //dd($student);
        return view('school.studentinfo')
            ->with('class',$class)
            ->with('bus',$route)
            ->with('student',$student)
            ->with('title','Student Information | Adminstrator');
    }

    

    public function deleteStudentInfo(Request $request)
    {
        $this->student = $this->student->findOrFail($request->id);

        if (!$this->student) {
            $request->session()->flash('error', 'No student found.');
            return redirect()->back();
        }

        $thumb = $this->student->image;


        $del = $this->student->delete();

        if ($del) {
            if (file_exists(public_path() . "/uploads/student/" . $thumb)) {
                unlink(public_path() . "/uploads/student/" . $thumb);
            }

            $request->session()->flash('success', 'Data Deleted successfully.');
        } else {
            $request->session()->flash('error', 'Sorry! Data could not be deleted at this moment.');
        }
        return redirect()->back();
    }

    public function addstudentInfo(Request $request){
    	//dd($request);

    	$validate = Validator::make($request->all(),$this->student->getRules());
    	if($validate->fails()){
            $errors =  $validate->messages();
            //dd($errors);
            \Session::flash('error','Problem in adding Student Information'); 
            return redirect()->back()->with('errors',$errors);
        }
        $act = "add";

        if (isset($request->id)) {
            $act = "update";
            //$rules['image'] = 'sometimes|image|max:5000';
            $this->student = $this->student->find($request->id);
        }

        //$request->validate($rules);

        $data = $request->except(['_token']);
        //$data['dob'] = $request->Year.-.$request->Month.-.$request->Date.
        $data['slug'] = $this->student->getSlug($data['student_name']);
        $data['dob'] = $request->Year."-".$request->Month."-".$request->Date;
        $path = public_path() . "/uploads/student";
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        if ($request->image) {
            $file_name = "Student-" . date('Ymdhis') . rand(0, 999) . "." . $request->image->getClientOriginalExtension();
            $success = $request->image->move($path, $file_name);

            if ($success) {
                if (isset($this->student->image) && !empty($this->student->image) && file_exists(public_path() . '/uploads/student/' . $this->student->image)) {
                    unlink(public_path() . '/uploads/student/' . $this->student->image);
                }

                $data['image'] = $file_name;
            }
        }

        $this->student->fill($data);
        $success = $this->student->save();
        if ($success) {
            $request->session()->flash('success', 'Student Information ' . $act . 'ed successfully.');
        } else {
            $request->session()->flash('error', 'Sorry! There was problem while ' . $act . 'ing student information at this momemnt.');
        }

        return redirect()->back();
    }


    public function getSubjectByClass($id){
        $data  = $this->class->getSubjectByClass($id);
       // dd($data);
    }
}
