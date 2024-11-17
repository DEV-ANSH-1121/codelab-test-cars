<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    private $brands = [
        [
            'name' => 'Toyota',
            'logo' => 'https://www.carlogos.org/car-logos/toyota-logo.png'
        ],
        [
            'name' => 'BMW',
            'logo' => 'https://www.carlogos.org/car-logos/bmw-logo-2020-gray.png'
        ],
        [
            'name' => 'Mercedes-Benz',
            'logo' => 'https://www.carlogos.org/logo/Mercedes-Benz-logo-2011-1920x1080.png'
        ],
        [
            'name' => 'Audi',
            'logo' => 'https://www.carlogos.org/car-logos/audi-logo-2016.png'
        ],
        [
            'name' => 'Honda',
            'logo' => 'https://www.carlogos.org/car-logos/honda-logo.png'
        ],
        [
            'name' => 'Ford',
            'logo' => 'https://www.carlogos.org/car-logos/ford-logo-2017.png'
        ],
        [
            'name' => 'Volkswagen',
            'logo' => 'https://www.carlogos.org/car-logos/volkswagen-logo.png'
        ],
        [
            'name' => 'Porsche',
            'logo' => 'https://www.carlogos.org/car-logos/porsche-logo.png'
        ],
        [
            'name' => 'Hyundai',
            'logo' => 'https://www.carlogos.org/car-logos/hyundai-logo-2011.png'
        ],
        [
            'name' => 'Kia',
            'logo' => 'https://www.carlogos.org/car-logos/kia-logo.png'
        ],
        [
            'name' => 'Mazda',
            'logo' => 'https://www.carlogos.org/car-logos/mazda-logo-2018.png'
        ],
        [
            'name' => 'Subaru',
            'logo' => 'https://www.carlogos.org/car-logos/subaru-logo-2019.png'
        ],
        [
            'name' => 'Lexus',
            'logo' => 'https://www.carlogos.org/car-logos/lexus-logo.png'
        ],
        [
            'name' => 'Volvo',
            'logo' => 'https://www.carlogos.org/car-logos/volvo-logo.png'
        ],
        [
            'name' => 'Land Rover',
            'logo' => 'https://www.carlogos.org/car-logos/land-rover-logo.png'
        ],
        [
            'name' => 'Jaguar',
            'logo' => 'https://www.carlogos.org/car-logos/jaguar-logo-2012.png'
        ],
        [
            'name' => 'Chevrolet',
            'logo' => 'https://www.carlogos.org/car-logos/chevrolet-logo.png'
        ],
        [
            'name' => 'Nissan',
            'logo' => 'https://www.carlogos.org/car-logos/nissan-logo-2020-black.png'
        ],
        [
            'name' => 'Ferrari',
            'logo' => 'https://www.carlogos.org/car-logos/ferrari-logo-2002.png'
        ],
        [
            'name' => 'Lamborghini',
            'logo' => 'https://www.carlogos.org/car-logos/lamborghini-logo.png'
        ],
        // Add more brands as needed...
    ];

    public function run()
    {
        foreach ($this->brands as $brandData) {
            Brand::create([
                'name' => $brandData['name'],
                'logo' => $brandData['logo'],
                'is_active' => true,
            ]);
        }
    }
}
