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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('image');
            $table->integer('card_id')->unsigned();
            $table->text('origin');
            $table->text('address');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('religion_id')->unsigned();
            $table->integer('nationality_id')->unsigned();
            $table->integer('ethnicity_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
