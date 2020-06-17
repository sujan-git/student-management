<?php


use Illuminate\Database\Seeder;
use App\Model\Classes;

class AcademicclassSeeder extends Seeder
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
	                'name'=>'Nursery',
	            ),
	            array(
	                'name'=>'LKG',
	            ),
	            array(
	                'name'=>'UKG',
	            ),
	            array(
	                'name'=>'Class 1',
	            ),
	            array(
	                'name'=>'Class 2',
	            ),
	            array(
	                'name'=>'Class 3',
	            ),
	            array(
	                'name'=>'Class 4',
	            ),
	            array(
	                'name'=>'Class 5',
	            ),
	            array(
	                'name'=>'Class 6',
	            ),
	            array(
	                'name'=>'Class 7',
	            ),
	            array(
	                'name'=>'Class 8',
	            ),
	            array(
	                'name'=>'Class 9',
	            ),
	            array(
	                'name'=>'Class 10',
	            )
	    );

            foreach($array as $key=>$value){
            	$class = Classes::where('name', $value['name'])->first();
	            if (!$class) {
	                $class = new Classes();
	            }
                $class = new Classes();
            	$class->fill($value);
            	$class->save();
        	}
        
    }
}
