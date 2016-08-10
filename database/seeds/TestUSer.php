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
        $u->first_name = 'Peter';
        $u->last_name = 'Lloyd';
        $u->email = 'peter.lloyd@example.com';
        $u->password = bcrypt('password');
        $u->phone = '01454 278392';
        $u->line1 = Faker\Provider\en_GB\Address::buildingNumber();
        $u->line2 = Faker\Provider\en_GB\Address::streetSuffix();
        $u->line3 = Faker\Provider\en_GB\Address::cityPrefix();
        $u->line4 = Faker\Provider\en_GB\Address::buildingNumber();
        $u->city = Faker\Provider\en_GB\Address::cityPrefix() . Faker\Provider\en_GB\Address::citySuffix();
        $u->county = Faker\Provider\en_GB\Address::county();
        $u->postcode = Faker\Provider\en_GB\Address::postcode();
        $u->country = Faker\Provider\en_GB\Address::country();
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
