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
            'currency_id'=>3,
            'category_id'=>2,
            'region_id'=>2,
            'status'=>'جديد',
            'primary_image'=>'assets/listing_images/cars.png'
        ]);

        listing::create([
            'title'=>'بيت جميل جدا جدا',
            'user_id'=>1,
            'description'=>'بيت يتكون من غرفتين وحمام ومطبخ',
            'price'=>'40000',
            'currency_id'=>4,
            'category_id'=>28,
            'region_id'=>5,
            'status'=>'جديد',
            'primary_image'=>'assets/listing_images/houses.png'
        ]);
    }
}
