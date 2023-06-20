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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('birth_date');
            $table->integer('age');
            $table->foreignId('country_id')->nullable()->constrained(table: 'countries', indexName: 'students_country_id');
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->char('zip_code');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->foreignId('learning_center_id')->constrained();
            $table->string('learning_center_type');
            $table->foreignId('session_id')->constrained();
            $table->date('enroll_date');
            $table->string('class');
            $table->integer('class_roll');
            $table->boolean('is_still_in_learning_center')->default(1);
            $table->string('institute_name');
            $table->string('institute_type');
            $table->string('address_of_institute');
            $table->string('grade_of_students');
            $table->string('department');
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
