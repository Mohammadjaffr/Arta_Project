<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['code' => 'SAR', 'name' => 'ر.س'],
            ['code' => 'USD', 'name' => 'دولار'],
            ['code' => 'YER_OLD', 'name' => 'ر.ي.ق'],
            ['code' => 'YER_NEW', 'name' => 'ر.ي.ج'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
