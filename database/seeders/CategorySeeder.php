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
            ['id' => 1, 'name' => 'سيارات', 'parent_id' => null],
            
            // تويوتا
            ['id' => 2, 'name' => 'تويوتا', 'parent_id' => 1],
            ['id' => 3, 'name' => 'لاندكروزر', 'parent_id' => 2],
            ['id' => 4, 'name' => 'كامري', 'parent_id' => 2],
            ['id' => 5, 'name' => 'افالون', 'parent_id' => 2],
            ['id' => 6, 'name' => 'هايلوكس', 'parent_id' => 2],
            ['id' => 7, 'name' => 'كورولا', 'parent_id' => 2],
            ['id' => 8, 'name' => 'اف جي', 'parent_id' => 2],
            ['id' => 9, 'name' => 'ربع', 'parent_id' => 2],
            ['id' => 10, 'name' => 'شاص', 'parent_id' => 2],
            ['id' => 11, 'name' => 'يارس', 'parent_id' => 2],
            ['id' => 12, 'name' => 'برادو', 'parent_id' => 2],
            ['id' => 13, 'name' => 'فورتشنر', 'parent_id' => 2],
            ['id' => 14, 'name' => 'كرسيدا', 'parent_id' => 2],
            ['id' => 15, 'name' => 'باص', 'parent_id' => 2],
            ['id' => 16, 'name' => 'انوفا', 'parent_id' => 2],
            ['id' => 17, 'name' => 'راف فور', 'parent_id' => 2],
            ['id' => 18, 'name' => 'ايكو', 'parent_id' => 2],
        
            // فورد
            ['id' => 19, 'name' => 'فورد', 'parent_id' => 1],
            ['id' => 20, 'name' => 'كراون فكتوريا', 'parent_id' => 19],
            ['id' => 21, 'name' => 'جراند ماركيز', 'parent_id' => 19],
            ['id' => 22, 'name' => ' ', 'parent_id' => 19],
        
            // شيفروليه
            ['id' => 23, 'name' => 'شيفروليه', 'parent_id' => 1],
            ['id' => 24, 'name' => 'كابريس', 'parent_id' => 23],
            ['id' => 25, 'name' => 'ترافيرس', 'parent_id' => 23],

            // __________________________________________________________
            // الفئة الرئيسية للعقار
            ['id' => 26, 'name' => 'عقار', 'parent_id' => null],
    
            // فئات العقار
            ['id' => 27, 'name' => 'أراضي للبيع', 'parent_id' => 26],
            ['id' => 28, 'name' => 'شقق للايجار', 'parent_id' => 26],
            ['id' => 29, 'name' => 'فلل للبيع', 'parent_id' => 26],
            ['id' => 30, 'name' => 'شقق للبيع', 'parent_id' => 26],
            ['id' => 31, 'name' => 'بيوت للبيع', 'parent_id' => 26],
            ['id' => 32, 'name' => 'أراضي تجارية للبيع', 'parent_id' => 26],
            ['id' => 33, 'name' => 'عمارة للبيع', 'parent_id' => 26],
            ['id' => 34, 'name' => 'استراحات للايجار', 'parent_id' => 26],
            ['id' => 35, 'name' => 'محلات للتقبيل', 'parent_id' => 26],
            ['id' => 36, 'name' => 'محلات للايجار', 'parent_id' => 26],
            ['id' => 37, 'name' => 'عمارة للايجار', 'parent_id' => 26],
            ['id' => 38, 'name' => 'استراحات للبيع', 'parent_id' => 26],
            ['id' => 39, 'name' => 'فلل للايجار', 'parent_id' => 26],
            ['id' => 40, 'name' => 'مزارع للبيع', 'parent_id' => 26],
            ['id' => 41, 'name' => 'أدوار للايجار', 'parent_id' => 26],
            ['id' => 42, 'name' => 'بيوت للايجار', 'parent_id' => 26],
            ['id' => 43, 'name' => 'دور للبيع', 'parent_id' => 26],
            ['id' => 44, 'name' => 'شاليهات للبيع', 'parent_id' => 26],
            ['id' => 45, 'name' => 'غرف للايجار', 'parent_id' => 26],
            ['id' => 46, 'name' => 'قاعة للايجار', 'parent_id' => 26],
            ['id' => 47, 'name' => 'كمباوند للايجار', 'parent_id' => 26],
            ['id' => 48, 'name' => 'كمباوند للبيع', 'parent_id' => 26],
            ['id' => 49, 'name' => 'مخيمات للايجار', 'parent_id' => 26],
            ['id' => 50, 'name' => 'مزرعة للايجار', 'parent_id' => 26],
            ['id' => 51, 'name' => 'مستودع للبيع', 'parent_id' => 26],
            ['id' => 52, 'name' => 'مستودعات للايجار', 'parent_id' => 26],
            ['id' => 53, 'name' => 'مكاتب للايجار', 'parent_id' => 26],

            // ____________________________________________________
            // الفئة  للأجهزة
            ['id' => 54, 'name' => 'أجهزة', 'parent_id' => null],
    
            // الجوالات 
            ['id' => 55, 'name' => 'جوالات', 'parent_id' => 54],
            ['id' => 56, 'name' => 'آبل', 'parent_id' => 55],
            ['id' => 57, 'name' => 'آيفون', 'parent_id' => 55],
            ['id' => 58, 'name' => 'آيبود', 'parent_id' => 55],
            ['id' => 59, 'name' => 'ساعة آبل', 'parent_id' => 55],
            ['id' => 60, 'name' => 'سامسونج', 'parent_id' => 55],
            ['id' => 61, 'name' => 'جالكسي اس', 'parent_id' => 60],
            ['id' => 62, 'name' => 'جالكسي نوت', 'parent_id' => 60],
            ['id' => 63, 'name' => 'هواوي', 'parent_id' => 55],
            ['id' => 64, 'name' => 'سوني', 'parent_id' => 55],
            ['id' => 65, 'name' => 'اكسبيريا', 'parent_id' => 64],
            ['id' => 66, 'name' => 'بلاك بيري', 'parent_id' => 55],
            ['id' => 67, 'name' => 'نوكيا', 'parent_id' => 55],
            ['id' => 68, 'name' => 'إتش تي سي', 'parent_id' => 55],
            ['id' => 69, 'name' => 'أجهزة تابلت', 'parent_id' => 54],
            ['id' => 70, 'name' => 'آيباد', 'parent_id' => 69],
            ['id' => 71, 'name' => 'جالكسي تاب', 'parent_id' => 69],

            //  الكمبيوتر
            ['id' => 72, 'name' => 'أجهزة كمبيوتر', 'parent_id' => 54],
            ['id' => 73, 'name' => 'كمبيوتر مكتبي', 'parent_id' => 72],
            ['id' => 74, 'name' => 'لابتوب', 'parent_id' => 72],
            ['id' => 75, 'name' => 'ماك بوك MacBook', 'parent_id' => 74],
            ['id' => 76, 'name' => 'سورفس Surface', 'parent_id' => 74],
            ['id' => 77, 'name' => 'لاب توب سوني', 'parent_id' => 74],
            ['id' => 78, 'name' => 'توشيبا', 'parent_id' => 74],
            ['id' => 79, 'name' => 'ديل', 'parent_id' => 74],
            ['id' => 80, 'name' => 'اسوس', 'parent_id' => 74],
            ['id' => 81, 'name' => 'ايسر', 'parent_id' => 74],
            ['id' => 82, 'name' => 'أجهزة شبكات', 'parent_id' => 72],
            ['id' => 83, 'name' => 'شاشات وبرجكتر', 'parent_id' => 72],
            ['id' => 84, 'name' => 'طابعات وماسحات', 'parent_id' => 72],
            ['id' => 85, 'name' => 'ملحقات كمبيوتر', 'parent_id' => 72],
            
            // ألعاب إلكترونية
            ['id' => 86, 'name' => 'ألعاب إلكترونية', 'parent_id' => 54],
            ['id' => 87, 'name' => 'نظارات VR', 'parent_id' => 86],
            ['id' => 88, 'name' => 'اجهزة بلاي ستيشن PS', 'parent_id' => 86],
            ['id' => 89, 'name' => 'العاب بلاي ستيشن PS', 'parent_id' => 86],
            ['id' => 90, 'name' => 'اجهزة اكس بوكس Xbox', 'parent_id' => 86],
            ['id' => 91, 'name' => 'العاب اكس بوكس Xbox', 'parent_id' => 86],
        ];
        DB::table('categories')->insert($categories);
    }
}
