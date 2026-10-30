<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');

            $table->string('student_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->date('dob')->nullable();

            $table->string('enrollment')->nullable();
            $table->date('enrollment_date');

            $table->text('description')->nullable();

            $table->unsignedBigInteger('dept_id');

            $table->timestamps();

            $table->foreign('dept_id')
                ->references('dept_id')
                ->on('departments')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};