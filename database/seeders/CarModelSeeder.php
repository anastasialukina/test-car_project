<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    const RECORDS = [
        [
            'brand_id' => 9,
            'name' => 'G80',
        ],
        [
            'brand_id' => 9,
            'name' => 'GV70',
        ],
        [
            'brand_id' => 9,
            'name' => 'GV80',
        ],
        [
            'brand_id' => 9,
            'name' => 'G70',
        ],
        [
            'brand_id' => 4,
            'name' => 'Getz',
        ],
        [
            'brand_id' => 4,
            'name' => 'i10',
        ],
        [
            'brand_id' => 4,
            'name' => 'Solaris',
        ],
        [
            'brand_id' => 1,
            'name' => 'Picanto',
        ],
        [
            'brand_id' => 1,
            'name' => 'Rio',
        ],
        [
            'brand_id' => 1,
            'name' => 'Soul',
        ],
        [
            'brand_id' => 2,
            'name' => 'Kimo',
        ],
        [
            'brand_id' => 2,
            'name' => 'Tiger',
        ],
        [
            'brand_id' => 3,
            'name' => 'Logan',
        ],
        [
            'brand_id' => 3,
            'name' => 'Captur',
        ],
        [
            'brand_id' => 3,
            'name' => 'Megane',
        ],
        [
            'brand_id' => 5,
            'name' => '911',
        ],
        [
            'brand_id' => 5,
            'name' => 'Cayenne',
        ],
        [
            'brand_id' => 5,
            'name' => 'Panamera',
        ],
        [
            'brand_id' => 6,
            'name' => 'Model 3',
        ],
        [
            'brand_id' => 6,
            'name' => 'Model Y',
        ],
        [
            'brand_id' => 7,
            'name' => 'A4',
        ],
        [
            'brand_id' => 7,
            'name' => 'A6',
        ],
        [
            'brand_id' => 7,
            'name' => 'Q5',
        ],
        [
            'brand_id' => 8,
            'name' => 'Camaro',
        ],
        [
            'brand_id' => 8,
            'name' => 'Suburban',
        ],
        [
            'brand_id' => 8,
            'name' => 'Equinox',
        ],
        [
            'brand_id' => 10,
            'name' => 'Fiesta',
        ],
        [
            'brand_id' => 10,
            'name' => 'Mustang',
        ],
        [
            'brand_id' => 10,
            'name' => 'Taurus',
        ],
        [
            'brand_id' => 11,
            'name' => 'X3',
        ],
        [
            'brand_id' => 11,
            'name' => 'X5',
        ],
        [
            'brand_id' => 11,
            'name' => 'X6',
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::RECORDS as $item) {
            $record = new CarModel();
            $record->brand_id = $item['brand_id'];
            $record->name = $item['name'];
            $record->save();
        }
    }
}

