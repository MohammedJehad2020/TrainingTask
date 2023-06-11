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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable()->after('password');
            $table->dateTime('last_login_at')->nullable()->after('image');
            $table->string('last_login_ip_address')->after('last_login_at')->nullable();
            $table->string('status')->nullable()->after('remember_token');
            $table->string('language')->nullable()->after('status');
            $table->text('description')->nullable()->after('language');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('last_login_at');
            $table->dropColumn('last_login_ip_address');
            $table->dropColumn('status');
            $table->dropColumn('language');
            $table->dropColumn('description');

        });
    }
};
