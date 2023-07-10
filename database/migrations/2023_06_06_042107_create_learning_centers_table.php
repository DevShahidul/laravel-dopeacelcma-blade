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
        Schema::create('learning_centers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ngo_id')->constrained();
            $table->string('name');
            $table->foreignId('country_id')->nullable()->constrained(table: 'countries', indexName: 'learning_centers_country_id');
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->char('zip_code');
            $table->string('address');
            $table->enum('type', ['coaching', 'pre_school'])->default('pre_school');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_centers');
    }
};
