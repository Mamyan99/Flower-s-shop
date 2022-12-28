<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
                [
                    'value' => 'red',
                ],
                [
                    'value' => 'blue',
                ],
                [
                    'value' => 'pink',
                ],
                [
                    'value' => 'white',
                ],
                [
                    'value' => 'orange',
                ],
                [
                    'value' => 'yellow',
                ],
                [
                    'value' => 'green',
                ],
                [
                    'value' => 'indigo',
                ],
                [
                    'value' => 'violet',
                ],
                [
                    'value' => 'purple',
                ],
                [
                    'value' => 'black',
                ],
                [
                    'value' => 'mix',
                ],
        ]);
    }
}
