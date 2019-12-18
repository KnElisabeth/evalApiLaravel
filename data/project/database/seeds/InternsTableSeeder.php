<?php

use Illuminate\Database\Seeder;

class InternsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interns')->insert([
            'firstname' => 'Lamsy',
            'lastname' => 'Nute',
            'age' => 22,
            'phone_number' => '13457896',
            'email'=>'lasmy@lasmy.fr',
        ]);
        DB::table('interns')->insert([
            'firstname' => 'Zabeth',
            'lastname' => 'Market',
            'age' => 12,
            'phone_number' =>'45789623',
            'email'=>'zabeth@zabeth.fr',
        ]);
        DB::table('interns')->insert([
            'firstname' => 'Ocean',
            'lastname' => 'Pacifique',
            'age' => 340,
            'phone_number' => '20245879',
            'email'=>'ocean@ocean.fr',
        ]);
    }
}
