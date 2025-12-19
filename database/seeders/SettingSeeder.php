<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Setting::firstOrCreate(
            ['id' => 1], 
            [
                'app_name' => env('APP_NAME'),
                'primary_color_hex' => env('APP_COLOR_PRIMARY'),
                'secondary_color_hex' => env('APP_COLOR_SECONDARY'),
                'light_logo_path' => env('APP_LOGO_LIGHT'),
                'dark_logo_path' => env('APP_LOGO_DARK'),
                'light_logo_tablet_path' => env('APP_LOGO_LIGHT_MINI'),
                'dark_logo_tablet_path' => env('APP_LOGO_DARK_MINI'),
                'logo_dark_email_path' => env('MAIL_LOGO_DARK'),
                'favicon_path' => env('APP_LOGO_FAVICON'),
                'cnpj' => env('CNPJ_COMPANY'),
                'company_phone' => env('PHONE_ADMIN'),
                'company_email' => env('MAIL_ADMIN'),
                'url_site' => env('URL_SITE'),
                'url_whatsapp' => env('URL_WHATSAPP'),
                'url_linkedin' => env('URL_LINKEDIN'),
                'url_facebook' => env('URL_FACEBOOK'),
                'url_instagram' => env('URL_INSTAGRAM'),
                'url_github' => env('URL_GITHUB'),
            ]
        );
    }
}
