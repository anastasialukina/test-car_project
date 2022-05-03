<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    const RECORDS = [
        'Kia',
        'Cherry',
        'Renault',
        'Hyundai',
        'Porsche',
        'Tesla',
        'Audi',
        'Chevrolet',
        'Genesis',
        'Ford',
        'BMW'
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::RECORDS as $item) {
            $record = new CarBrand();
            $record->name = $item;
            $record->save();
        }
    }

}
