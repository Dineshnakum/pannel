<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $y = date('Y');
        $fromDate = date('Y-m-d');
        $toDate = (($y + 1) . '-03-31 23:59:59');
        Setting::query()->create([
            'company_name' => 'Chamunda Auto',
            'email' => 'cmwebsolution2019@gmail.com',
            'contact_person' => 'test',
            'contact_no' => '02808-267222',
            'contact_person2' => 'test2',
            'contact_no2' => '02808-267222',
            'invoice_title' => 'test invoice',
            'address' => null,
            'image' => null,
            'subscription_start' => $fromDate,
            'subscription_end' => $toDate,
        ]);
    }
}
