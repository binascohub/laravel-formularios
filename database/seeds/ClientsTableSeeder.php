<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 3)->state(Client::TYPE_INDIVIDUAL)->create();
        factory(Client::class, 3)->state(Client::TYPE_LEGAL)->create();
    }
}
