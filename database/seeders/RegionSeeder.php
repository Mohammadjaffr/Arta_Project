<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            // المناطق الرئيسية
            ['id' => 1, 'name' => 'صنعاء', 'parent_id' => null, 'latitude' => 15.3694, 'longitude' => 44.1910],
            ['id' => 2, 'name' => 'عدن', 'parent_id' => null, 'latitude' => 12.7855, 'longitude' => 45.0187],
            ['id' => 3, 'name' => 'تعز', 'parent_id' => null, 'latitude' => 13.5789, 'longitude' => 44.0220],
            ['id' => 4, 'name' => 'الحديدة', 'parent_id' => null, 'latitude' => 14.8022, 'longitude' => 42.9511],
            ['id' => 5, 'name' => 'إب', 'parent_id' => null, 'latitude' => 13.9667, 'longitude' => 44.1833],
            ['id' => 6, 'name' => 'حضرموت', 'parent_id' => null, 'latitude' => 15.3547, 'longitude' => 48.5164],
            ['id' => 7, 'name' => 'المهرة', 'parent_id' => null, 'latitude' => 16.5238, 'longitude' => 52.3183],

            // أحياء صنعاء
            ['id' => 8, 'name' => 'حي الصافية', 'parent_id' => 1, 'latitude' => 15.3540, 'longitude' => 44.2066],
            ['id' => 9, 'name' => 'حي حدة', 'parent_id' => 1, 'latitude' => 15.3927, 'longitude' => 44.2012],
            ['id' => 10, 'name' => 'حي السبعين', 'parent_id' => 1, 'latitude' => 15.3153, 'longitude' => 44.2245],
            ['id' => 11, 'name' => 'حي المطار', 'parent_id' => 1, 'latitude' => 15.4762, 'longitude' => 44.2197],

            // أحياء عدن
            ['id' => 12, 'name' => 'كريتر', 'parent_id' => 2, 'latitude' => 12.7800, 'longitude' => 45.0335],
            ['id' => 13, 'name' => 'المعلا', 'parent_id' => 2, 'latitude' => 12.7896, 'longitude' => 44.9826],
            ['id' => 14, 'name' => 'التواهي', 'parent_id' => 2, 'latitude' => 12.7817, 'longitude' => 44.9589],
            ['id' => 15, 'name' => 'خور مكسر', 'parent_id' => 2, 'latitude' => 12.8275, 'longitude' => 45.0336],

            // أحياء تعز
            ['id' => 16, 'name' => 'المدينة', 'parent_id' => 3, 'latitude' => 13.5792, 'longitude' => 44.0209],
            ['id' => 17, 'name' => 'المطار', 'parent_id' => 3, 'latitude' => 13.6856, 'longitude' => 44.1371],
            ['id' => 18, 'name' => 'المرور', 'parent_id' => 3, 'latitude' => 13.6014, 'longitude' => 44.0183],
            ['id' => 19, 'name' => 'المغرب', 'parent_id' => 3, 'latitude' => 13.5667, 'longitude' => 43.9833],

            // أحياء الحديدة
            ['id' => 20, 'name' => 'المدينة', 'parent_id' => 4, 'latitude' => 14.8022, 'longitude' => 42.9511],
            ['id' => 21, 'name' => 'الحالي', 'parent_id' => 4, 'latitude' => 14.7986, 'longitude' => 42.9548],
            ['id' => 22, 'name' => 'كثيب', 'parent_id' => 4, 'latitude' => 14.8150, 'longitude' => 42.9433],

            // أحياء إب
            ['id' => 23, 'name' => 'المدينة', 'parent_id' => 5, 'latitude' => 13.9667, 'longitude' => 44.1833],
            ['id' => 24, 'name' => 'الرباط', 'parent_id' => 5, 'latitude' => 13.9714, 'longitude' => 44.1758],
            ['id' => 25, 'name' => 'الجبلة', 'parent_id' => 5, 'latitude' => 13.9561, 'longitude' => 44.1706],

            // أحياء حضرموت
            ['id' => 26, 'name' => 'المكلا', 'parent_id' => 6, 'latitude' => 14.5300, 'longitude' => 49.1314],
            ['id' => 27, 'name' => 'الشحر', 'parent_id' => 6, 'latitude' => 14.7593, 'longitude' => 49.6094],
            ['id' => 28, 'name' => 'سيئون', 'parent_id' => 6, 'latitude' => 15.9631, 'longitude' => 48.7875],
            ['id' => 29, 'name' => 'تريم', 'parent_id' => 6, 'latitude' => 16.0569, 'longitude' => 49.0286],

            // أحياء المهرة
            ['id' => 30, 'name' => 'المهرة', 'parent_id' => 7, 'latitude' => 16.5238, 'longitude' => 52.3183],
            ['id' => 31, 'name' => 'حصوين', 'parent_id' => 7, 'latitude' => 16.2667, 'longitude' => 51.1500],
            ['id' => 32, 'name' => 'الغيضة', 'parent_id' => 7, 'latitude' => 16.2000, 'longitude' => 52.1667],
            ['id' => 33, 'name' => 'قشن', 'parent_id' => 7, 'latitude' => 16.1667, 'longitude' => 51.1333],
        ];

        DB::table('regions')->insert($regions);
    }
}
