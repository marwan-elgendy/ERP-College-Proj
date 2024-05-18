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
        Schema::create('proffesors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subject_id');
            $table->string('mobile_number');
            $table->string('national_id');
            $table->double('subject_cut');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proffesors');
    }
};
