<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@hotmail.com',
            'password'=>'123456789',
            'username'=>'admin',
            'contact_number'=>'777777777',
            'whatsapp_number'=>'777777777',
        ])->addRole('admin');
    }
}
