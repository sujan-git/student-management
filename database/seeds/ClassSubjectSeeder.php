<?php

use Illuminate\Database\Seeder;
use App\Model\ClassSubject;

class ClassSubjectSeeder extends Seeder
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
	                'class_id'=>'4',
	                'subject_id'=>'1',
	            ),
	            array(
	                'class_id'=>'4',
	                'subject_id'=>'2',
	            ),
	            array(
	                'class_id'=>'4',
	                'subject_id'=>'3',
	            ),
	            array(
	                'class_id'=>'4',
	                'subject_id'=>'4',
	            ),
	            array(
	                'class_id'=>'4',
	                'subject_id'=>'6',
	            ),
	            array(
	                'class_id'=>'4',
	                'subject_id'=>'7',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'1',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'2',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'3',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'4',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'5',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'6',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'7',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'8',
	            ),
	            array(
	                'class_id'=>'13',
	                'subject_id'=>'9',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'1',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'2',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'3',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'4',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'5',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'6',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'7',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'8',
	            ),
	            array(
	                'class_id'=>'12',
	                'subject_id'=>'9',
	            ),
	           
	            
	    );

            foreach($array as $key=>$value){
            
                /*$class_subject =ClassSubject::where('class_id', $value['class_id'])->first();
	            if (!$class_subject) {
	                $class_subject = new ClassSubject();
	            }*/
	            $class_subject = new ClassSubject();
            	$class_subject->fill($value);
            	$class_subject->save();
        	}
    }
}
