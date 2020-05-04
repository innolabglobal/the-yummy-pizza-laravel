<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

const DUMMY_PIZZAS = [
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_AM.jpg',
        'name'        => 'CHICKENSAURUS',
        'description' => 'Roasted Chicken, Chicken Pepperoni and Mushroom Slices on our awesome Smoky Blended BBQ Sauce (Surcharge Applies).',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_UH.jpg',
        'name'        => 'ULTIMATE HAWAIIAN',
        'description' => 'Loads of delicious roasted chicken, shredded chicken juicy pineapples and fresh mushrooms on our brand new pizza.',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_MT.jpg',
        'name'        => 'MEATASAURUS',
        'description' => 'Generous portions of everyone\'s favorite beef pepperoni, ground beef and fresh mushrooms on our new blended smoky BBQ sauce (Surcharge Applies)',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_GF.jpg',
        'name'        => 'CHICKEN CONFIDENTIAL',
        'description' => 'Onions, cherry tomatoes, pineapple, chicken potpourri, roasted chicken and shredded chicken on our delicious Top Secret Sauce',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_ST.jpg',
        'name'        => 'SAMBAL SURF &amp; TURF',
        'description' => 'Succulent Prawns marinated in herbs &amp; spices, Shredded Chicken, Juicy Pineapples and Green Peppers on our new and authentic sambal sauce. (Surcharge Applies)',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_PU.jpg',
        'name'        => 'PRAWN SENSATION',
        'description' => 'Succulent Prawns marinated in Italian herbs &amp; spices, imported Belgian spinach, juicy cherry tomatoes &amp; onions with our brand new pizza sauce! (Surcharge Applie',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_SU.jpg',
        'name'        => 'TROPICAL SAMBAL PRAWN',
        'description' => 'Succulent Prawns marinated in herbs &amp; spices, Fresh Onions, juicy Pineapples, Red Chillies on our new and authentic sambal sauce.',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
    [
        'image'       => 'https://cache.dominos.com/olo/6_19_3/assets/build/market/MY/_en/images/img/products/thumbnails/S_PP.jpg',
        'name'        => 'PRAWN PASSION',
        'description' => 'Succulent prawns, marinated in Italian herbs and spices, juicy cherry tomatoes &amp; onions on our new pesto passion sauce! (Surcharge Applies)',
        'priceOption' => [
            [
                'priceName'  => 'small',
                'priceValue' => 10
            ],
            [
                'priceName'  => 'large',
                'priceValue' => 12
            ]
        ]
    ],
];

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        foreach (DUMMY_PIZZAS as $menu) {
            $newMenu = Menu::firstOrCreate([
                'name'        => $menu['name'],
                'description' => $menu['description'],
                'image'       => $menu['image'],
            ]);

            foreach ($menu['priceOption'] as $option) {
                $newMenu->priceOption()->create(
                    [
                        'name'  => $option['priceName'],
                        'value' => $option['priceValue'],
                    ]
                );
            }
        }
    }

}
