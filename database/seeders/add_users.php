<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class add_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name'=>'ousmane10',
        'email'=>'ousmane@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);

       User::create([
        'name'=>'ousseynou',
        'email'=>'ousseynou@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);

       User::create([
        'name'=>'bacary20',
        'email'=>'bacary@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'thies'
       ]);

       User::create([
        'name'=>'kalneymar10',
        'email'=>'kalneymar@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);

       User::create([
        'name'=>'bmg',
        'email'=>'bmg@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);

       User::create([
        'name'=>'laye10',
        'email'=>'laye@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'paris'
       ]);

       User::create([
        'name'=>'cheihk2020',
        'email'=>'cheihk@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);

       User::create([
        'name'=>'sbd10',
        'email'=>'sbd@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'diourbel'
       ]);

       User::create([
        'name'=>'cyc',
        'email'=>'cyc@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);

       User::create([
        'name'=>'elninho',
        'email'=>'elninho@gmail.com',
        'profil'=>'photo.png',
        'password' => bcrypt('12345678'),
        'ville'=>'dakar'
       ]);
       
    }
}
