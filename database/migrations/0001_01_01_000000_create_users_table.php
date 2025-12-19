<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // ex: admin, premium, free
            $table->string('label')->nullable(); // opcional ex: "Administrador", "Usuário Premium"
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->default(2);
            $table->foreignId('cargo_id')->constrained();
            $table->string('name', 40);
            $table->string('last_name', 40)->nullable()->default(null);
            $table->string('email', 100)->unique();
            $table->string('password', 200);
            $table->string('phone', 40);
            $table->string('username', 40)->unique()->nullable()->default(null);
            $table->string('photo_perfil_path', 255)->nullable()->default(null);
            $table->datetime('email_verified_at')->nullable()->default(null);
            $table->datetime('admin_verified_at')->nullable()->default(null);
            $table->datetime('blocked_until')->nullable()->default(null);
            $table->boolean('active')->default(true);
            $table->datetime('last_login_at')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });




        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();        // ex: "create_post"
            $table->string('label')->nullable();     // nome amigável: "Criar Post"
            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->foreignId('permission_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_role'); // Deve vir primeiro que 'permissions' e 'roles'
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('cargos');
    }
};
