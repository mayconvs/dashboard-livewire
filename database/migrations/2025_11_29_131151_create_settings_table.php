<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // --- Configurações de Cores e Marca ---
            $table->string('app_name')->default(env('APP_NAME'));
            $table->string('primary_color_hex')->default(env('APP_COLOR_PRIMARY')); 
            $table->string('secondary_color_hex')->default(env('APP_COLOR_SECONDARY')); 
            
            // --- Logos e Favicon ---
            $table->string('light_logo_path')->nullable()->default(env('APP_LOGO_LIGHT'));
            $table->string('dark_logo_path')->nullable()->default(env('APP_LOGO_DARK'));
            $table->string('light_logo_tablet_path')->nullable()->default(env('APP_LOGO_LIGHT_MINI'));
            $table->string('dark_logo_tablet_path')->nullable()->default(env('APP_LOGO_DARK_MINI'));
            $table->string('logo_dark_email_path')->nullable()->default(env('MAIL_LOGO_DARK'));
            $table->string('favicon_path')->nullable()->default(env('APP_LOGO_FAVICON'));
            
            // --- Outras Configurações (Ex: Contato, Rodapé, etc.) ---
            $table->string('cnpj')->default(env('CNPJ_COMPANY'));
            $table->string('company_phone')->default(env('PHONE_ADMIN'));
            $table->string('company_email')->nullable()->default(env('MAIL_ADMIN'));
            $table->string('url_site')->nullable()->default(env('URL_SITE'));
            $table->string('url_whatsapp')->nullable()->default(env('URL_WHATSAPP'));
            $table->string('url_linkedin')->nullable()->default(env('URL_LINKEDIN'));
            $table->string('url_facebook')->nullable()->default(env('URL_FACEBOOK'));
            $table->string('url_instagram')->nullable()->default(env('URL_INSTAGRAM'));
            $table->string('url_github')->nullable()->default(env('URL_GITHUB'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
