<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\ProductImage;

class ProductImageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_images')->truncate();

        factory('CodeCommerce\ProductImage')->create(
        	[
		        'product_id' => 1,
		        'extension' => 'jpg',
		    ]
        );

    }
}
