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
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('basic_salary_id');
            $table->foreign('basic_salary_id')->references('id')->on('basic_salaries')->onDelete('cascade');
            $table->integer('quantity_attendance');
            $table->integer('allowed_leave_days')->nullable();
            $table->integer('approved_leave_days')->default(0);
            $table->integer('absent_days')->default(0); // Set default value to 0
            $table->decimal('deducted_salary', 10, 2)->default(0); // Set default value to 0
            $table->decimal('final_salary', 10, 2)->default(0); // Set default value to 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
