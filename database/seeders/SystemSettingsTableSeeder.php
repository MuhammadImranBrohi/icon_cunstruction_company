<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsTableSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['key'=>'site_name','value'=>'Company Management System'],
            ['key'=>'default_currency','value'=>'PKR'],
            ['key'=>'timezone','value'=>'Asia/Karachi'],
            ['key'=>'date_format','value'=>'Y-m-d'],
            ['key'=>'time_format','value'=>'H:i:s'],
            ['key'=>'language','value'=>'en'],
            ['key'=>'max_login_attempts','value'=>'5'],
            ['key'=>'password_expiry_days','value'=>'90'],
            ['key'=>'session_timeout','value'=>'30'],
            ['key'=>'notification_email','value'=>'admin@example.com'],
        ];

        foreach ($settings as $setting) {
            DB::table('system_settings')->insert([
                'key' => $setting['key'],
                'value' => $setting['value'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}