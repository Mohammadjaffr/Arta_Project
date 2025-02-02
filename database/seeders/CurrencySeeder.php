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
            ['code' => 'SAR', 'name' => 'الريال السعودي', 'abbr' => 'ر.س'],
            ['code' => 'USD', 'name' => 'الدولار الأمريكي', 'abbr' => 'دولار'],
            ['code' => 'YER_OLD', 'name' => 'الريال اليمني القديم', 'abbr' => 'ر.ي.ق'],
            ['code' => 'YER_NEW', 'name' => 'الريال اليمني الجديد', 'abbr' => 'ر.ي.ج'],
            ['code' => 'OMR', 'name' => 'الريال العماني', 'abbr' => 'ر.ع.'],
            ['code' => 'AED', 'name' => 'الدرهم الإماراتي', 'abbr' => 'د.إ'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
