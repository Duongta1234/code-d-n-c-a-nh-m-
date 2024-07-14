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
        Schema::create('interview_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('candidate_id');
            $table->unsignedInteger('interview_schedule_id');
            $table->string('result_interview');
            $table->string('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('interview_schedule_id')->references('id')->on('interview_schedule');
            $table->foreign('candidate_id')->references('id')->on('candidates');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_results');
    }
};
