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
        if (!Schema::hasColumn('user_data', 'imgPerfil')) {
            Schema::table('user_data', function (Blueprint $table) {
                $table->string('imgPerfil')->nullable();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('user_data', 'imgPerfil')) {
            Schema::table('user_data', function (Blueprint $table) {
                $table->dropColumn('imgPerfil');
            });
        }
    }
};
