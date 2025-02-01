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
            ['code' => 'SAR', 'name' => 'سعودي'],
            ['code' => 'USD', 'name' => 'دولار'],
            ['code' => 'YER_OLD', 'name' => 'يمني قديم'],
            ['code' => 'YER_NEW', 'name' => 'يمني جديد'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
