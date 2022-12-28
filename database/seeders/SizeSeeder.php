<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            [
                'value' => '20',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '30',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '40',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '50',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '60',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '70',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '80',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '90',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '100',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '110',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '120',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '130',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '140',
                'unit_of_measurement' => 'cm'
            ],
            [
                'value' => '150',
                'unit_of_measurement' => 'cm'
            ],
        ]);
    }
}
