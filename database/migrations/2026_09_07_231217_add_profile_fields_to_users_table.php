<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('name');
            $table->string('address')->nullable()->after('age');
            $table->date('birthdate')->nullable()->after('address');
            $table->string('profile_picture')->nullable()->after('birthdate');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'age',
                'address',
                'birthdate',
                'profile_picture',
            ]);
        });
    }
};