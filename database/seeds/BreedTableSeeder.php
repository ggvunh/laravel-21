<?php

use Illuminate\Database\Seeder;

class BreedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->insert([
            ['name' => 'Domestic'],
            ['name' => 'Persian'],
            ['name' => 'Siamese'],
            ['name' => 'Abysinian']
        ]);
    }
}
