<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Laratrust\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'أدمن'
        ]);
        $permissions = Permission::all()->pluck('id')->toArray();
        $adminRole->permissions()->attach($permissions);

        Role::create(
            ['name'=>'user',
            'display_name'=>'مستخدم']
        )->permissions()->attach([9,10,11,21,25,27,28,29,30,35]);
    }
}