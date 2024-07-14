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
        Schema::create('interview_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('interview_time');
            $table->string('interview_location');
            $table->string('job_position');
            $table->integer('status')->default(0);
            $table->unsignedInteger('user_id')-> nullable();
            $table->unsignedInteger('candidate_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('candidate_id')->references('id')->on('candidates');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_schedule');
    }
};
