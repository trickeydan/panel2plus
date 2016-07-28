<?php

use Illuminate\Database\Seeder;

class TestUSer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new \Panel\User;
        $u->username = 'pete';
        $u->first_name = 'Peter';
        $u->last_name = 'Lloyd';
        $u->email = 'peter.lloyd@example.com';
        $u->password = bcrypt('password');
        $u->save();
    }
}
