<?php

use Illuminate\Database\Seeder;
use App\Model\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(         
	            array(
	                'subject'=>'English',
	                'full_marks_theory'=>'80',
	                'full_marks_practical'=>'20',
	                'pass_marks_theory'=>'32',
	                'pass_marks_practical'=>'8'
	            ),
	            array(
	                'subject'=>'Social Studies',
	                'full_marks_theory'=>'80',
	                'full_marks_practical'=>'20',
	                'pass_marks_theory'=>'32',
	                'pass_marks_practical'=>'8'
	            ),
	            array(
	                'subject'=>'Mathematics',
	                'full_marks_theory'=>'100',
	                'full_marks_practical'=>'0',
	                'pass_marks_theory'=>'40',
	                'pass_marks_practical'=>'0'
	            ),
	            array(
	                'subject'=>'Science',
	                'full_marks_theory'=>'80',
	                'full_marks_practical'=>'20',
	                'pass_marks_theory'=>'32',
	                'pass_marks_practical'=>'8'
	            ),
	            array(
	                'subject'=>'Account',
	                'full_marks_theory'=>'80',
	                'full_marks_practical'=>'20',
	                'pass_marks_theory'=>'32',
	                'pass_marks_practical'=>'8'
	            ),
	            array(
	                'subject'=>'Computer Science',
	                'full_marks_theory'=>'75',
	                'full_marks_practical'=>'25',
	                'pass_marks_theory'=>'30',
	                'pass_marks_practical'=>'12'
	            ),
	            array(
	                'subject'=>'Environment,Health and Population',
	                'full_marks_theory'=>'80',
	                'full_marks_practical'=>'20',
	                'pass_marks_theory'=>'32',
	                'pass_marks_practical'=>'8'
	            ),
	            array(
	                'subject'=>'Nepali',
	                'full_marks_theory'=>'100',
	                'full_marks_practical'=>'0',
	                'pass_marks_theory'=>'40',
	                'pass_marks_practical'=>'0'
	            ),
	            array(
	                'subject'=>'Economics',
	                'full_marks_theory'=>'100',
	                'full_marks_practical'=>'0',
	                'pass_marks_theory'=>'40',
	                'pass_marks_practical'=>'0'
	            ),
	            
	            
	    );

            foreach($array as $key=>$value){
            	$subject = Subject::where('subject', $value['subject'])->first();
	            if (!$subject) {
	                $subject = new Subject();
	            }
                
            	$subject->fill($value);
            	$subject->save();
        	}
    }
}
