<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Permissions = [
            ['id' => 1, 'name' => 'create-categorie', 'display_name' => 'إنشاء صنف'],
            ['id' => 2, 'name' => 'destroy-categorie', 'display_name' => 'حذف صنف'],
            ['id' => 3, 'name' => 'view-categorie', 'display_name' => 'عرض صنف'],
            ['id' => 4, 'name' => 'update-categorie', 'display_name' => 'تعديل صنف'],

            ['id' => 5, 'name' => 'create-region', 'display_name' => 'إنشاء منطقة'],
            ['id' => 6, 'name' => 'destroy-region', 'display_name' => 'حذف منطقة'],
            ['id' => 7, 'name' => 'view-region', 'display_name' => 'عرض منطقة'],
            ['id' => 8, 'name' => 'update-region', 'display_name' => 'تعديل منطقة'],

            ['id' => 9, 'name' => 'create-comment', 'display_name' => 'إنشاء تعليق'],
            ['id' => 10, 'name' => 'destroy-comment', 'display_name' => 'حذف تعليق'],
            ['id' => 11, 'name' => 'view-comment', 'display_name' => 'عرض تعليق'],
            ['id' => 12, 'name' => 'update-comment', 'display_name' => 'تعديل تعليق'],

            ['id' => 13, 'name' => 'create-permission', 'display_name' => 'إنشاء صلاحية'],
            ['id' => 14, 'name' => 'destroy-permission', 'display_name' => 'حذف صلاحية'],
            ['id' => 15, 'name' => 'view-permission', 'display_name' => 'عرض صلاحية'],
            ['id' => 16, 'name' => 'update-permission', 'display_name' => 'تعديل صلاحية'],

            ['id' => 17, 'name' => 'create-role', 'display_name' => 'إنشاء نوع'],
            ['id' => 18, 'name' => 'destroy-role', 'display_name' => 'حذف نزع'],
            ['id' => 19, 'name' => 'view-role', 'display_name' => 'عرض نزع'],
            ['id' => 20, 'name' => 'update-role', 'display_name' => 'تعديل نزع'],
        ];
        DB::table('permissions')->insert($Permissions);
    }
}
