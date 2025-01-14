<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Voeg alleen nieuwe kolommen toe
        if (!Schema::hasColumn('users', 'username')) {
            $table->string('username')->nullable()->unique();
        }
        if (!Schema::hasColumn('users', 'about_me')) {
            $table->text('about_me')->nullable();
        }
        if (!Schema::hasColumn('users', 'birthday')) {
            $table->date('birthday')->nullable();
        }
        if (!Schema::hasColumn('users', 'profile_photo_path')) {
            $table->string('profile_photo_path')->nullable();
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['username', 'about_me', 'birthday', 'profile_photo_path']);
    });
}

};
