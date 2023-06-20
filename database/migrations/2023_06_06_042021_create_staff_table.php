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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->foreignId('country_id')->nullable()->constrained(table: 'countries', indexName: 'staff_country_id');
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->char('zip_code');
            $table->string('address');
            $table->string('facebook_url');
            $table->string('whatsapp_number')->nullable();
            $table->foreignId('ngo_id')->constrained();
            $table->foreignId('designation_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
