<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {

        Location::truncate();

        Location::create([
            'name' => 'Sede Principal',
            'image' => 'https://static3.depositphotos.com/1005951/226/i/450/depositphotos_2264293-stock-photo-headquarters.jpg',
        ]);

        Location::create([
            'name' => 'Sede Secundaria',
            'image' => 'https://media.istockphoto.com/id/1398608726/es/vector/edificio-de-la-escuela-secundaria-de-oto%C3%B1o.jpg?s=612x612&w=0&k=20&c=3yAwUjhf1L1XLTIX_rVOQh1VpkRxrbp6S4jQlL4xjRg=',
        ]);
    }
}
