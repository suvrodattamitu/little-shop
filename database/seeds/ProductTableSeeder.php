<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    
    public function run()
    {
       $product = new Product([

       	'description' => 'its super cool to eat. enjoy',
       	'imagePath'   => 'https://hdwallsource.com/img/2014/6/food-wallpaper-5775-5940-hd-wallpapers.jpg',
       	'title'		  => 'Pizza',
       	'price'		  => 10

       	]);

       $product->save();

        $product = new Product([

       	'description' => 'try it. enjoy',
       	'imagePath'   => 'http://www.greatgrubclub.com/domains/greatgrubclub.com/local/media/images/medium/4_1_1_apple.jpg',
       	'title'		  => 'Apple',
       	'price'		  => 5

       	]);

       $product->save();


        $product = new Product([

       	'description' => 'its super cool to eat. enjoy',
       	'imagePath'   => 'https://upload.wikimedia.org/wikipedia/commons/d/de/FraiseFruitPhoto.jpg',
       	'title'		  => 'Strawberry',
       	'price'		  => 12

       	]);

       $product->save();

        $product = new Product([

       	'description' => 'you will chill. enjoy',
       	'imagePath'   => 'https://www.organicfacts.net/wp-content/uploads/Jackfruit.jpg',
       	'title'		  => 'Jackfruit',
       	'price'		  => 7

       	]);

       $product->save();

        $product = new Product([

       	'description' => 'alls healthy. enjoy',
       	'imagePath'   => 'https://www.rodalewellness.com/sites/rodalewellness.com/files/styles/listicle_slide_custom_user_phone_1x/public/papaya-summer-fruit-ss.jpg?itok=2GHmGRn0',
       	'title'		  => 'papaya',
       	'price'		  => 80

       	]);

       $product->save();

        $product = new Product([

       	'description' => 'compete fresh. enjoy',
       	'imagePath'   => 'https://www.rd.com/wp-content/uploads/2016/11/03_fruits_veggies_better_off_buying_frozen_mango_ALEAIMAGE.jpg',
       	'title'		  => 'Mango',
       	'price'		  => 15

       	]);

       $product->save();

    }
}
