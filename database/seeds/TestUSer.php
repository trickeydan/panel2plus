<?php

use Illuminate\Database\Seeder;
use Panel\Server;

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
        $u->name = 'Peter Lloyd';
        $u->password = bcrypt('password');
        $u->zb_id = 75545; //25171
        $u->save();

        $d = new \Panel\Domain;
        $d->name = 'testdomain.test';
        $d->user_id = $u->id;
        $d->save();

        Server::create([
            'name' => 'Amethyst Server',
            'main_ip' => '178.62.10.20',
        ]);


    }
}
