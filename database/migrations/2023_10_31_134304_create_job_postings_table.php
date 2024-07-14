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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('request');
            $table->string('salary');
            $table->text('benefit');
            $table->string('working_time');
            $table->string('address');
            $table->date('application_deadline');
            $table->string('contact');
            $table->integer('status')->default(0);
            $table->unsignedInteger('job_position_id');
            $table->unsignedInteger('user_id');
            $table->softDeletes();
            $table->timestamps();
            //$table->foreignId('user_id')->constrained()->name('user_id_foreign');
            //$table->foreignId('job_position_id')->constrained()->name('job_position_foreign');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('job_position_id')->references('id')->on('job_position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
