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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('religion_id')->references('id')->on('religions');
            $table->foreign('ethnicity_id')->references('id')->on('ethnicities');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_card_id_foreign');
            $table->dropForeign('employees_user_id_foreign');
            $table->dropForeign('employees_nationality_id_foreign');
            $table->dropForeign('employees_religion_id_foreign');
            $table->dropForeign('employees_ethnicity_id_foreign');
            $table->dropForeign('employees_level_id_foreign');
            $table->dropForeign('employees_position_id_foreign');
        });
    }
};
