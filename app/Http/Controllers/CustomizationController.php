<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class CustomizationController extends Controller
{
    public function index()
    {
        $data['contact'] = ContactUs::first();
        $data['nav'] = Nav::first();
        $data['navItem'] = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('customization', $data);
    }

    public function show($slug)
    {
        $data['contact'] = ContactUs::first();
        $data['nav'] = Nav::first();
        $data['navItem'] = Nav::where('id', '!=', '1')->orderBy('order')->get();
        $roomImages = [
            'Living Room Space' => [
                [
                    'img' => asset('assets/images/living/living1.jpg'),
                    'slug' => 'livingRoomSpace1',
                    'name' => __("messages.testing"),
                ],
                [
                    'img' => asset('assets/images/living/living2.jpg'),
                    'slug' => 'livingRoomSpace2',
                    'name' => 'testing',
                ],
                [
                    'img' => asset('assets/images/living/living3.jpg'),
                    'slug' => 'livingRoomSpace3',
                    'name' => 'livingRoomSpace3',
                ],
                [
                    'img' => asset('assets/images/living/living4.jpg'),
                    'slug' => 'livingRoomSpace4',
                    'name' => 'livingRoomSpace4',
                ],
                [
                    'img' => asset('assets/images/living/living5.jpg'),
                    'slug' => 'livingRoomSpace5',
                    'name' => 'livingRoomSpace5',
                ],
                [
                    'img' => asset('assets/images/living/living6.jpg'),
                    'slug' => 'livingRoomSpace6',
                    'name' => 'livingRoomSpace6',
                ],
            ],
            'Kitchen' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'kitchen1',
                    'name' => 'kitchen1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'kitchen2',
                    'name' => 'kitchen2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'kitchen3',
                    'name' => 'kitchen3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'kitchen4',
                    'name' => 'kitchen4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'kitchen5',
                    'name' => 'kitchen5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'kitchen6',
                    'name' => 'kitchen6',
                ],
            ],

            'Door glass' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glass1',
                    'name' => 'glass1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glass2',
                    'name' => 'glass2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glass3',
                    'name' => 'glass3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glass4',
                    'name' => 'glass4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glass5',
                    'name' => 'glass5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glass6',
                    'name' => 'glass6',
                ],
            ],


            'Wardrobe' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'wardrobe1',
                    'name' => 'wardrobe1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'wardrobe2',
                    'name' => 'wardrobe2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'wardrobe3',
                    'name' => 'wardrobe3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'wardrobe4',
                    'name' => 'wardrobe4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'wardrobe5',
                    'name' => 'wardrobe5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'wardrobe6',
                    'name' => 'wardrobe6',
                ],
            ],

            'Mirror' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'mirror1',
                    'name' => 'mirror1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'mirror2',
                    'name' => 'mirror2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'mirror3',
                    'name' => 'mirror3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'mirror4',
                    'name' => 'mirror4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'mirror5',
                    'name' => 'mirror5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'mirror6',
                    'name' => 'mirror6',
                ],
            ],

            'Living Room Cabnet' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'livingRoomCabnet1',
                    'name' => 'livingRoomCabnet1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'livingRoomCabnet2',
                    'name' => 'livingRoomCabnet2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'livingRoomCabnet3',
                    'name' => 'livingRoomCabnet3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'livingRoomCabnet4',
                    'name' => 'livingRoomCabnet4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'livingRoomCabnet5',
                    'name' => 'livingRoomCabnet5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'livingRoomCabnet6',
                    'name' => 'livingRoomCabnet6',
                ],
            ],

            'Bathroom Space' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bathroomSpace1',
                    'name' => 'bathroomSpace1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bathroomSpace2',
                    'name' => 'bathroomSpace2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bathroomSpace3',
                    'name' => 'bathroomSpace3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bathroomSpace4',
                    'name' => 'bathroomSpace4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bathroomSpace5',
                    'name' => 'bathroomSpace5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bathroomSpace6',
                    'name' => 'bathroomSpace6',
                ],
            ],

            'Study Space' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'studySpace1',
                    'name' => 'studySpace1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'studySpace2',
                    'name' => 'studySpace2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'studySpace3',
                    'name' => 'studySpace3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'studySpace4',
                    'name' => 'studySpace4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'studySpace5',
                    'name' => 'studySpace5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'studySpace6',
                    'name' => 'studySpace6',
                ],
            ],

            'Book Cabinet' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bookCabinet1',
                    'name' => 'bookCabinet1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bookCabinet2',
                    'name' => 'bookCabinet2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bookCabinet3',
                    'name' => 'bookCabinet3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bookCabinet4',
                    'name' => 'bookCabinet4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bookCabinet5',
                    'name' => 'bookCabinet5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bookCabinet6',
                    'name' => 'bookCabinet6',
                ],
            ],

            'Glass Fix' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassFix1',
                    'name' => 'glassFix1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassFix2',
                    'name' => 'glassFix2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassFix3',
                    'name' => 'glassFix3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassFix4',
                    'name' => 'glassFix4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassFix5',
                    'name' => 'glassFix5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassFix6',
                    'name' => 'glassFix6',
                ],
            ],

            'Balcony' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'balcony1',
                    'name' => 'balcony1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'balcony2',
                    'name' => 'balcony2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'balcony3',
                    'name' => 'balcony3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'balcony4',
                    'name' => 'balcony4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'balcony5',
                    'name' => 'balcony5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'balcony6',
                    'name' => 'balcony6',
                ],
            ],

            'Railing' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'railing1',
                    'name' => 'railing1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'railing2',
                    'name' => 'railing2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'railing3',
                    'name' => 'railing3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'railing4',
                    'name' => 'railing4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'railing5',
                    'name' => 'railing5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'railing6',
                    'name' => 'railing6',
                ],
            ],

            'Glass Windows' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassWindows1',
                    'name' => 'glassWindows1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassWindows2',
                    'name' => 'glassWindows2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassWindows3',
                    'name' => 'glassWindows3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassWindows4',
                    'name' => 'glassWindows4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassWindows5',
                    'name' => 'glassWindows5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'glassWindows6',
                    'name' => 'glassWindows6',
                ],
            ],

            'Bedroom Space' => [
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bedroomSpace1',
                    'name' => 'bedroomSpace1',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bedroomSpace2',
                    'name' => 'bedroomSpace2',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bedroomSpace3',
                    'name' => 'bedroomSpace3',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bedroomSpace4',
                    'name' => 'bedroomSpace4',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bedroomSpace5',
                    'name' => 'bedroomSpace5',
                ],
                [
                    'img' => asset('assets/images/testing.jpg'),
                    'slug' => 'bedroomSpace6',
                    'name' => 'bedroomSpace6',
                ],
            ],
        ];

        $imageData = null;

        foreach ($roomImages as $items) {
            foreach ($items as $image) {
                if ($image['slug'] === $slug) {
                    $imageData = [
                        'name' => $image['name'],
                        'images' => is_array($image['img']) ? $image['img'] : [$image['img']],
                    ];
                    break 2;
                }
            }
        }

        if (!$imageData) {
            abort(404);
        }

        return view('customization.show', $imageData,$data);
    }
}
