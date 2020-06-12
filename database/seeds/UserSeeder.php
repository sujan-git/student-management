
<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name'=>'admin',
                //'adress'=>'Bharatpur',
                'email'=>'admin@school.com',
                'role'=>'admin',
                'password'=>Hash::make('school123'),
                'phone'=>'9845612577'
            ),
            array(
                'name'=>'teacher1',
                'email'=>'teacher@school.com',
                'role'=>'teacher',
                'password'=>Hash::make('teacher123'),
                'phone'=>'9845612577'
            )
        );
        foreach($array as $key=>$value){
            $user = User::where('email', $value['email'])->first();
            if(!$user){
                $user = new User();
            }
            $user->fill($value);
            $user->save();
        }
    }
}
