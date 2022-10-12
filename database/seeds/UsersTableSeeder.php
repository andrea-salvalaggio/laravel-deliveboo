<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'name'=> 'Pippo Franco',
                'email'=> 'pippofranco@ciao.com',
                'password'=> Hash::make('123pippo'),
                'p_iva'=>'398294329',
                'role'=> 1,
                'profilePic'=> 'https://wips.plug.it/cips/notizie.virgilio.it/cms/2022/07/pippo-franco-ricoverato-ictus.jpg',
            ],

            [
                'name'=> 'Jon Doh',
                'email'=> 'jondoh@ciao.com',
                'password'=> Hash::make('123jon'),
                'p_iva'=>'398249324',
                'role'=> 1,
                'profilePic'=> 'https://upload.wikimedia.org/wikipedia/commons/5/5a/John_Doe%2C_born_John_Nommensen_Duchac.jpg',
            ],

            [
                'name'=> 'Gustavo Fring',
                'email'=> 'gustavofring@badguy.com',
                'password'=> Hash::make('gustfringus666'),
                'p_iva'=>'327984279',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

        ];

        foreach ($users as $user) {

            $newUser = new User();

            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password= $user['password'];
            $newUser->p_iva = $user['p_iva'];
            $newUser->role = $user['role'];
            $newUser->profilePic = $user['profilePic'];

            $newUser->save();
        };
    }

}
