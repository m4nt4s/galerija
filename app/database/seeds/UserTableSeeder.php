<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'email'    => 'test@test.com',
            'username' => 'test',
            'name'     => 'test',
            'surname'  => 'test',
            'password' => Hash::make('test'),
            'city'     => 'test',
            'country'  => 'test',
            'address'  => 'test',
            'phone'    => 'test',
            'code'     => str_random(60),
            'admin'    => true,
            'active'   => true,
        ));
    }

}
