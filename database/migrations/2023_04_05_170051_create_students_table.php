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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 10)->nullable(false)->unique();
            $table->string('class', 5)->nullable(false);
            $table->string('name', 50)->nullable(false)->regex('[a-zA-Z\s]+');
            $table->date('birthday')->nullable(false);
            $table->string('gender');
            $table->string('phone', 11)->nullable()->regex('/^\d+$/');
            $table->string('email', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
