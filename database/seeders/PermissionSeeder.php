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

            ['id' => 17, 'name' => 'create-role', 'display_name' => 'إنشاء دور'],
            ['id' => 18, 'name' => 'destroy-role', 'display_name' => 'حذف دور'],
            ['id' => 19, 'name' => 'view-role', 'display_name' => 'عرض دور'],
            ['id' => 20, 'name' => 'update-role', 'display_name' => 'تعديل دور'],
            
            ['id' => 21, 'name' => 'create-complaint', 'display_name' => 'إنشاء شكوى'],
            ['id' => 22, 'name' => 'destroy-complaint', 'display_name' => 'حذف شكوى'],
            ['id' => 23, 'name' => 'view-complaint', 'display_name' => 'عرض شكوى'],
            ['id' => 24, 'name' => 'update-complaint', 'display_name' => 'تعديل شكوى'],

            ['id' => 25, 'name' => 'destroy-user', 'display_name' => 'حذف مستخدم'],
            ['id' => 26, 'name' => 'view-users', 'display_name' => 'عرض المستخدمين'],
            ['id' => 27, 'name' => 'view-user', 'display_name' => 'عرض مستخدم'],

            ['id' => 28, 'name' => 'create-listing', 'display_name' => 'إنشاء إعلان'],
            ['id' => 29, 'name' => 'destroy-listing', 'display_name' => 'حذف إعلان'],
            ['id' => 30, 'name' => 'update-listing', 'display_name' => 'تعديل إعلان'],
            
            ['id' => 31, 'name' => 'assignRole', 'display_name' => 'تعيين دور'],
            ['id' => 32, 'name' => 'revokeRole', 'display_name' => 'سحب دور'],

            ['id' => 33, 'name' => 'create-Currency', 'display_name' => 'إنشاء عمله'],
            ['id' => 34, 'name' => 'destroy-Currency', 'display_name' => 'حذف عمله'],
            ['id' => 35, 'name' => 'view-Currency', 'display_name' => 'عرض عمله'],
            ['id' => 36, 'name' => 'update-Currency', 'display_name' => 'تعديل عمله'],
            
        ];
        DB::table('permissions')->insert($Permissions);
    }
}
