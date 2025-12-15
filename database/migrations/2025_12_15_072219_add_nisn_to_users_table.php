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
        // Menambah kolom nisn setelah id, nullable karena admin/guru mungkin tidak punya nisn
        $table->string('nisn')->unique()->nullable()->after('id');
        $table->string('role')->default('student')->after('password'); // student, admin
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
