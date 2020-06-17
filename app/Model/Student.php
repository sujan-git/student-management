<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $fillable = ['student_name','slug','dob','class_level','roll_no','address','guardian_name','guardian_contact','gender','enrollment_year','bus_route','image','email','register_pswd'];

    public function getRules(){
    	return [
            'student_name' => 'required|string',
            'Date'=>'required|integer|digits_between:1,31',
            'Year'=>'required|integer|between:1900,2030',
            'Month'=>'required|integer|digits_between:1,12',
            'class_level'=>'required|integer|exists:classes,id',
            'roll_no'=>'sometimes|integer|digits_between:1,100',
            'enrollment_year'=>'required|integer|between:1900,2030',
            'address'=>'required|string',
            'guardian_name'=>'required|string',
            'guardian_contact'=>'required',
            'gender'=>'required|string|in:male,female,other',
            'bus_route'=>'sometimes|string|exists:bus_routes,name|nullable',
            'image'=>'sometimes|image|max:5000|nullable',
            
        ];
    }

    public function getSlug($string){
    	$slug = str_slug($string);
        $found = $this->where('slug', $slug)->first();
        if ($found) {
            $slug .= "-" . date('Ymdhis') . rand(0, 99);
        }
        return $slug;
    }

    public function getStudentByClass($id){

    }
}
