<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'name' => 'nodeJs',
        ]);
        DB::table('skills')->insert([
            'name' => 'laravel',
        ]);
        DB::table('skills')->insert([
            'name' => 'php',
        ]);
        DB::table('skills')->insert([
            'name' => 'Wordpress',
        ]);
        DB::table('skills')->insert([
            'name' => 'Css',
        ]);
    }
}
