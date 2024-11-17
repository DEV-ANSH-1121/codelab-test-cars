<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    private $models = [
        'Toyota' => [
            [
                'name' => 'Camry',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=toyota&modelFamily=camry&modelYear=2024&angle=1'
            ],
            [
                'name' => 'RAV4',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=toyota&modelFamily=rav4&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Corolla',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=toyota&modelFamily=corolla&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Highlander',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=toyota&modelFamily=highlander&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Tundra',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=toyota&modelFamily=tundra&modelYear=2024&angle=1'
            ],
        ],
        'BMW' => [
            [
                'name' => '3 Series',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=bmw&modelFamily=3-series&modelYear=2024&angle=1'
            ],
            [
                'name' => '5 Series',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=bmw&modelFamily=5-series&modelYear=2024&angle=1'
            ],
            [
                'name' => 'X5',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=bmw&modelFamily=x5&modelYear=2024&angle=1'
            ],
            [
                'name' => 'X7',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=bmw&modelFamily=x7&modelYear=2024&angle=1'
            ],
        ],
        'Mercedes-Benz' => [
            [
                'name' => 'C-Class',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=mercedes-benz&modelFamily=c-class&modelYear=2024&angle=1'
            ],
            [
                'name' => 'E-Class',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=mercedes-benz&modelFamily=e-class&modelYear=2024&angle=1'
            ],
            [
                'name' => 'S-Class',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=mercedes-benz&modelFamily=s-class&modelYear=2024&angle=1'
            ],
            [
                'name' => 'GLE',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=mercedes-benz&modelFamily=gle&modelYear=2024&angle=1'
            ],
        ],
        'Audi' => [
            [
                'name' => 'A4',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=audi&modelFamily=a4&modelYear=2024&angle=1'
            ],
            [
                'name' => 'A6',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=audi&modelFamily=a6&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Q5',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=audi&modelFamily=q5&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Q7',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=audi&modelFamily=q7&modelYear=2024&angle=1'
            ],
        ],
        'Honda' => [
            [
                'name' => 'Civic',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=honda&modelFamily=civic&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Accord',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=honda&modelFamily=accord&modelYear=2024&angle=1'
            ],
            [
                'name' => 'CR-V',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=honda&modelFamily=cr-v&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Pilot',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=honda&modelFamily=pilot&modelYear=2024&angle=1'
            ],
        ],
        'Volkswagen' => [
            [
                'name' => 'Golf',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=volkswagen&modelFamily=golf&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Passat',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=volkswagen&modelFamily=passat&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Tiguan',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=volkswagen&modelFamily=tiguan&modelYear=2024&angle=1'
            ],
            [
                'name' => 'Atlas',
                'year' => 2024,
                'image' => 'https://cdn.imagin.studio/getimage/?customer=img&make=volkswagen&modelFamily=atlas&modelYear=2024&angle=1'
            ],
        ],
        // Continue with more brands...
    ];

    public function run()
    {
        foreach ($this->models as $brandName => $models) {
            $brand = Brand::where('name', $brandName)->first();
            if (!$brand) continue;

            foreach ($models as $modelData) {
                CarModel::create([
                    'brand_id' => $brand->id,
                    'name' => $modelData['name'],
                    'manufacturing_year' => $modelData['year'],
                    'image' => $modelData['image'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
