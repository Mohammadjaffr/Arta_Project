<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $categories = [
            // الفئة السيارات
            ['id' => 1, 'name' => 'سيارات', 'parent_id' => null,'image'=>'assets/Category_images/cars.png'],
            
            // تويوتا
            ['id' => 2, 'name' => 'تويوتا', 'parent_id' => 1,'image'=>null],
            ['id' => 3, 'name' => 'لاندكروزر', 'parent_id' => 2,'image'=>null],
            ['id' => 4, 'name' => 'كامري', 'parent_id' => 2,'image'=>null],
            ['id' => 5, 'name' => 'افالون', 'parent_id' => 2,'image'=>null],
            ['id' => 6, 'name' => 'هايلوكس', 'parent_id' => 2,'image'=>null],
            ['id' => 7, 'name' => 'كورولا', 'parent_id' => 2,'image'=>null],
            ['id' => 8, 'name' => 'اف جي', 'parent_id' => 2,'image'=>null],
            ['id' => 9, 'name' => 'ربع', 'parent_id' => 2,'image'=>null],
            ['id' => 10, 'name' => 'شاص', 'parent_id' => 2,'image'=>null],
            ['id' => 11, 'name' => 'يارس', 'parent_id' => 2,'image'=>null],
            ['id' => 12, 'name' => 'برادو', 'parent_id' => 2,'image'=>null],
            ['id' => 13, 'name' => 'فورتشنر', 'parent_id' => 2,'image'=>null],
            ['id' => 14, 'name' => 'كرسيدا', 'parent_id' => 2,'image'=>null],
            ['id' => 15, 'name' => 'باص', 'parent_id' => 2,'image'=>null],
            ['id' => 16, 'name' => 'انوفا', 'parent_id' => 2,'image'=>null],
            ['id' => 17, 'name' => 'راف فور', 'parent_id' => 2,'image'=>null],
            ['id' => 18, 'name' => 'ايكو', 'parent_id' => 2,'image'=>null],
        
            // فورد
            ['id' => 19, 'name' => 'فورد', 'parent_id' => 1,'image'=>null],
            ['id' => 20, 'name' => 'كراون فكتوريا', 'parent_id' => 19,'image'=>null],
            ['id' => 21, 'name' => 'جراند ماركيز', 'parent_id' => 19,'image'=>null],
            ['id' => 22, 'name' => ' ', 'parent_id' => 19,'image'=>null],
        
            // شيفروليه
            ['id' => 23, 'name' => 'شيفروليه', 'parent_id' => 1,'image'=>null],
            ['id' => 24, 'name' => 'كابريس', 'parent_id' => 23,'image'=>null],
            ['id' => 25, 'name' => 'ترافيرس', 'parent_id' => 23,'image'=>null],

            // __________________________________________________________
            // الفئة الرئيسية للعقار
            ['id' => 26, 'name' => 'عقار', 'parent_id' => null,'image'=>'assets/Category_images/houses.png'],
    
            // فئات العقار
            ['id' => 27, 'name' => 'أراضي للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 28, 'name' => 'شقق للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 29, 'name' => 'فلل للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 30, 'name' => 'شقق للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 31, 'name' => 'بيوت للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 32, 'name' => 'أراضي تجارية للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 33, 'name' => 'عمارة للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 34, 'name' => 'استراحات للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 35, 'name' => 'محلات للتقبيل', 'parent_id' => 26,'image'=>null],
            ['id' => 36, 'name' => 'محلات للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 37, 'name' => 'عمارة للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 38, 'name' => 'استراحات للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 39, 'name' => 'فلل للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 40, 'name' => 'مزارع للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 41, 'name' => 'أدوار للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 42, 'name' => 'بيوت للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 43, 'name' => 'دور للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 44, 'name' => 'شاليهات للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 45, 'name' => 'غرف للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 46, 'name' => 'قاعة للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 47, 'name' => 'كمباوند للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 48, 'name' => 'كمباوند للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 49, 'name' => 'مخيمات للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 50, 'name' => 'مزرعة للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 51, 'name' => 'مستودع للبيع', 'parent_id' => 26,'image'=>null],
            ['id' => 52, 'name' => 'مستودعات للايجار', 'parent_id' => 26,'image'=>null],
            ['id' => 53, 'name' => 'مكاتب للايجار', 'parent_id' => 26,'image'=>null],

            // ____________________________________________________
            // الفئة  للأجهزة
            ['id' => 54, 'name' => 'أجهزة', 'parent_id' => null,'image'=>'assets/Category_images/electronic.png'],
    
            // الجوالات 
            ['id' => 55, 'name' => 'جوالات', 'parent_id' => 54,'image'=>null],
            ['id' => 56, 'name' => 'آبل', 'parent_id' => 55,'image'=>null],
            ['id' => 57, 'name' => 'آيفون', 'parent_id' => 55,'image'=>null],
            ['id' => 58, 'name' => 'آيبود', 'parent_id' => 55,'image'=>null],
            ['id' => 59, 'name' => 'ساعة آبل', 'parent_id' => 55,'image'=>null],
            ['id' => 60, 'name' => 'سامسونج', 'parent_id' => 55,'image'=>null],
            ['id' => 61, 'name' => 'جالكسي اس', 'parent_id' => 60,'image'=>null],
            ['id' => 62, 'name' => 'جالكسي نوت', 'parent_id' => 60,'image'=>null],
            ['id' => 63, 'name' => 'هواوي', 'parent_id' => 55,'image'=>null],
            ['id' => 64, 'name' => 'سوني', 'parent_id' => 55,'image'=>null],
            ['id' => 65, 'name' => 'اكسبيريا', 'parent_id' => 64,'image'=>null],
            ['id' => 66, 'name' => 'بلاك بيري', 'parent_id' => 55,'image'=>null],
            ['id' => 67, 'name' => 'نوكيا', 'parent_id' => 55,'image'=>null],
            ['id' => 68, 'name' => 'إتش تي سي', 'parent_id' => 55,'image'=>null],
            ['id' => 69, 'name' => 'أجهزة تابلت', 'parent_id' => 54,'image'=>null],
            ['id' => 70, 'name' => 'آيباد', 'parent_id' => 69,'image'=>null],
            ['id' => 71, 'name' => 'جالكسي تاب', 'parent_id' => 69,'image'=>null],

            //  الكمبيوتر
            ['id' => 72, 'name' => 'أجهزة كمبيوتر', 'parent_id' => 54,'image'=>null],
            ['id' => 73, 'name' => 'كمبيوتر مكتبي', 'parent_id' => 72,'image'=>null],
            ['id' => 74, 'name' => 'لابتوب', 'parent_id' => 72,'image'=>null],
            ['id' => 75, 'name' => 'ماك بوك MacBook', 'parent_id' => 74,'image'=>null],
            ['id' => 76, 'name' => 'سورفس Surface', 'parent_id' => 74,'image'=>null],
            ['id' => 77, 'name' => 'لاب توب سوني', 'parent_id' => 74,'image'=>null],
            ['id' => 78, 'name' => 'توشيبا', 'parent_id' => 74,'image'=>null],
            ['id' => 79, 'name' => 'ديل', 'parent_id' => 74,'image'=>null],
            ['id' => 80, 'name' => 'اسوس', 'parent_id' => 74,'image'=>null],
            ['id' => 81, 'name' => 'ايسر', 'parent_id' => 74,'image'=>null],
            ['id' => 82, 'name' => 'أجهزة شبكات', 'parent_id' => 72,'image'=>null],
            ['id' => 83, 'name' => 'شاشات وبرجكتر', 'parent_id' => 72,'image'=>null],
            ['id' => 84, 'name' => 'طابعات وماسحات', 'parent_id' => 72,'image'=>null],
            ['id' => 85, 'name' => 'ملحقات كمبيوتر', 'parent_id' => 72,'image'=>null],
            
            // ألعاب إلكترونية
            ['id' => 86, 'name' => 'ألعاب إلكترونية', 'parent_id' => 54,'image'=>null],
            ['id' => 87, 'name' => 'نظارات VR', 'parent_id' => 86,'image'=>null],
            ['id' => 88, 'name' => 'اجهزة بلاي ستيشن PS', 'parent_id' => 86,'image'=>null],
            ['id' => 89, 'name' => 'العاب بلاي ستيشن PS', 'parent_id' => 86,'image'=>null],
            ['id' => 90, 'name' => 'اجهزة اكس بوكس Xbox', 'parent_id' => 86,'image'=>null],
            ['id' => 91, 'name' => 'العاب اكس بوكس Xbox', 'parent_id' => 86,'image'=>null],
        ];
        DB::table('categories')->insert($categories);
    }
}
