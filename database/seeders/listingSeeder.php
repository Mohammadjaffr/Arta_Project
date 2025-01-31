<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\listing;

class listingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        listing::create([
            'title'=>'سياره تويوتا جميله جدا',
            'user_id'=>1,
            'description'=>'سياره لا يوجد فيها اي عيب',
            'price'=>'20000',
            'category_id'=>2,
            'region_id'=>2,
            'status'=>'جديد',
            'primary_image'=>'assets/listing_images/cars.png'
        ]);
    }
}
