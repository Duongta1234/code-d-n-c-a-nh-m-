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
        Schema::create('wage_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->decimal('base_salary', 10, 2);
            $table->decimal('overtime_salary', 10, 2)->nullable();
            $table->decimal('holiday_salary', 10, 2)->nullable();
            $table->integer('leave_request');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wage_parameters');
    }
};
