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
//        Schema::table('provinces', function (Blueprint $table) {
//            // $table->foreign('nationality_id')->references('id')->on('nationalities');
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('provinces', function (Blueprint $table) {
//            // $table->dropForeign('provinces_nationality_id_foreign');
//        });
    }
};
