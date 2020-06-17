<?php

use App\Model\BusRoute;
use Illuminate\Database\Seeder;

class BusRouteSeeder extends Seeder
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
	                'name'=>'Pulchowk',
	            ),
	            array(
	                'name'=>'Chaubiskoti',
	            ),
	            array(
	                'name'=>'Bharatpur Height',
	            ),
	            array(
	                'name'=>'Trichowk',
	            ),
	            array(
	                'name'=>'Cancer Gate',
	            ),
	            array(
	                'name'=>'Paras Buspark',
	            ),
	            array(
	                'name'=>'Hospital Chowk',
	            ),
	            array(
	                'name'=>'Lions Chowk',
	            ),
	            array(
	                'name'=>'Dharma Chowk',
	            ),
	            array(
	                'name'=>'Chhetrapur',
	            ),
	            array(
	                'name'=>'Malpot Office',
	            ),
	            
	    );

            foreach($array as $key=>$value){
            
                $bus_route = BusRoute::where('name', $value['name'])->first();
	            if (!$bus_route) {
	                $bus_route = new BusRoute();
	            }
            	$bus_route->fill($value);
            	$bus_route->save();
        	}
    }
}
