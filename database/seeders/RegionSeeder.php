<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            // المناطق الرئيسية
            ['id' => 1, 'name' => 'صنعاء', 'parent_id' => null],
            ['id' => 2, 'name' => 'عدن', 'parent_id' => null],
            ['id' => 3, 'name' => 'تعز', 'parent_id' => null],
            ['id' => 4, 'name' => 'الحديدة', 'parent_id' => null],
            ['id' => 5, 'name' => 'إب', 'parent_id' => null],
            ['id' => 6, 'name' => 'حضرموت', 'parent_id' => null],
            ['id' => 7, 'name' => 'المهرة', 'parent_id' => null],

            // أحياء صنعاء
            ['id' => 8, 'name' => 'حي الصافية', 'parent_id' => 1],
            ['id' => 9, 'name' => 'حي حدة', 'parent_id' => 1],
            ['id' => 10, 'name' => 'حي السبعين', 'parent_id' => 1],
            ['id' => 11, 'name' => 'حي المطار', 'parent_id' => 1],

            // أحياء عدن
            ['id' => 12, 'name' => 'كريتر', 'parent_id' => 2],
            ['id' => 13, 'name' => 'المعلا', 'parent_id' => 2],
            ['id' => 14, 'name' => 'التواهي', 'parent_id' => 2],
            ['id' => 15, 'name' => 'خور مكسر', 'parent_id' => 2],

            // أحياء تعز
            ['id' => 16, 'name' => 'المدينة', 'parent_id' => 3],
            ['id' => 17, 'name' => 'المطار', 'parent_id' => 3],
            ['id' => 18, 'name' => 'المرور', 'parent_id' => 3],
            ['id' => 19, 'name' => 'المغرب', 'parent_id' => 3],

            // أحياء الحديدة
            ['id' => 20, 'name' => 'المدينة', 'parent_id' => 4],
            ['id' => 21, 'name' => 'الحالي', 'parent_id' => 4],
            ['id' => 22, 'name' => 'كثيب', 'parent_id' => 4],

            // أحياء إب
            ['id' => 23, 'name' => 'المدينة', 'parent_id' => 5],
            ['id' => 24, 'name' => 'الرباط', 'parent_id' => 5],
            ['id' => 25, 'name' => 'الجبلة', 'parent_id' => 5],

            // أحياء حضرموت
            ['id' => 26, 'name' => 'المكلا', 'parent_id' => 6],
            ['id' => 27, 'name' => 'الشحر', 'parent_id' => 6],
            ['id' => 28, 'name' => 'سيئون', 'parent_id' => 6],
            ['id' => 29, 'name' => 'تريم', 'parent_id' => 6],

            // أحياء المهرة
            ['id' => 30, 'name' => 'المهرة', 'parent_id' => 7],
            ['id' => 31, 'name' => 'حصوين', 'parent_id' => 7],
            ['id' => 32, 'name' => 'الغيضة', 'parent_id' => 7],
            ['id' => 33, 'name' => 'قشن', 'parent_id' => 7],
        ];
        DB::table('regions')->insert($regions);
    }
}
