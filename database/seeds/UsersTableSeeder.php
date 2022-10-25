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
                'name'=> 'Alessio Calabrese',
                'email'=> 'deliveboo1@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'39829432912',
                'role'=> 1,
                'profilePic'=> 'https://wips.plug.it/cips/notizie.virgilio.it/cms/2022/07/pippo-franco-ricoverato-ictus.jpg',
            ],

            [
                'name'=> 'Stefano Calarota',
                'email'=> 'deliveboo2@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'39824932456',
                'role'=> 1,
                'profilePic'=> 'https://upload.wikimedia.org/wikipedia/commons/5/5a/John_Doe%2C_born_John_Nommensen_Duchac.jpg',
            ],

            [
                'name'=> 'Simone Rizzo',
                'email'=> 'deliveboo3@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32798427989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Simone Saffiotti',
                'email'=> 'deliveboo4@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'328563058395',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Antonino Spena',
                'email'=> 'deliveboo5@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'37465937757',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Andrea Salvalaggio',
                'email'=> 'deliveboo6@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32539844938',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Matteo Genovese',
                'email'=> 'deliveboo7@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'36663398592',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Stefano Caratozzolo',
                'email'=> 'deliveboo8@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'39874987423',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Vito Farenga',
                'email'=> 'deliveboo9@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'36954226648',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Antonio Mendetta',
                'email'=> 'deliveboo10@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32748573511',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Gianpiero Fideli',
                'email'=> 'deliveboo11@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'37593757328',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Riccardo Petricca',
                'email'=> 'deliveboo12@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32792127989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Sofia Verdi',
                'email'=> 'deliveboo13@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32792127989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Riccardo Petricca',
                'email'=> 'deliveboo14@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32792127989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Leonardo Di Caprio',
                'email'=> 'deliveboo15@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32792127989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Julian Picco',
                'email'=> 'deliveboo16@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32792127989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Amal Jomon',
                'email'=> 'deliveboo17@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32792127989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

            [
                'name'=> 'Jim Morrison',
                'email'=> 'deliveboo18@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'37466264892',
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
