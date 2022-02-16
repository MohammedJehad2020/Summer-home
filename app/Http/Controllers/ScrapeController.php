<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Goutte\Client;

class ScrapeController extends Controller
{
    public function get_data(){
        $client = new Client();
        $url = 'https://summerhomes.com/';
        $url_home = 'https://summerhomes.com/apartments-that-offer-comfort-and-future-investment-oba';

        $data = $client->request('GET', $url);
        $data_home = $client->request('GET', $url_home);
        $image_url = '' ;
        $price = '';
        $size= '';
        $city= '';
        // ****
        $image_home='';
        $price = '';
        $desc = '';
        $facility = [];

        $data->filter('.property-list-slide .swiper-container .swiper-slide .card')->each(function ($home) use($image_url,$city, $price, $size){
            // dd($home->text());

            $home->filter('.box-item a')->each(function ($url) use($image_url){
                $image_url = $url->attr('href');            
            });

            $home->filter('.box-item .card-body h5')->each(function ($prices) use($price){
                  $price = $prices->text();                  
            });

            $home->filter('.box-item .card-body .card-text')->each(function ($sizes) use($size){
                 $size = $sizes->text();
                // dd($size->text());
          });

          $home->filter('.box-item .card-body .card-text')->each(function ($cityies) use($city){
            $city = $cityies->text();
            // dd($city->text());
          });


        });



        // Single home

        $data_home->filter('figure img ')->each(function ($image_homes) use($image_home){
                    $image_home = $image_homes->attr('src');  
                    // dd($image_home);          
                });

        $data_home->filter('.price-info h3 span .font-30')->each(function ($prices) use($price){
            $price = $prices->text();  
            // dd($price);          
        });

        $data_home->filter('.content p')->each(function ($description) use($desc){
            $desc = $description->text();  
            // dd($desc);          
        });

        $data_home->filter('.content ul li')->each(function ($facilities) use($facility){
            $facility = $facilities->text();  
            dd($facility);          
        });


        dd($data);


        Home::create([
        'Price' => $price,
        'Size' => $size,
        'City' => $city,
        'Description' => $desc,
        ]);

    }
}
