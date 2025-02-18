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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('activity_code', 20); 
            $table->foreign('activity_code')->references('activity_code')->on('activities')->onDelete('cascade'); 
            $table->unsignedBigInteger('collegeCode');  
            $table->foreign('collegeCode')->references('collegeCode')->on('colleges');
            $table->unsignedBigInteger('programId'); 
            $table->foreign('programId')->references('programId')->on('programs')->onDelete('cascade');  
            $table->integer('trainees_target')->nullable();
            $table->integer('trainees_accomp')->nullable();
            $table->integer('partnership_target')->nullable();
            $table->string('partnership_name')->nullable();
            $table->integer('partnership_accomp');
            $table->integer('percentage_target')->nullable();
            $table->integer('percentage_accomp')->nullable();
            $table->boolean('is_updated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
