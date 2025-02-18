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
        Schema::create('activities', function (Blueprint $table) {
            $table->string('activity_code', 20)->primary();
            $table->string('activity_name');
            $table->unsignedBigInteger('collegeCode');  
            $table->foreign('collegeCode')->references('collegeCode')->on('colleges');
            $table->unsignedBigInteger('proponentId'); 
            $table->foreign('proponentId')->references('programId')->on('programs')->onDelete('cascade');  
            $table->string('proponent')->nullable();  
            $table->string('proponents');   
            $table->year('year');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->enum('quarter', ['1', '2', '3', '4'])->nullable();
            $table->decimal('budget', 10, 2)->nullable();
            $table->enum('status', ['For Implementation', 'Ongoing', 'Accomplished'])->default('For Implementation');
            $table->string('moa_uploaded')->nullable();
            $table->timestamp('moa_uploaded_at')->nullable();
            $table->string('proposal_uploaded')->nullable();
            $table->timestamp('proposal_uploaded_at')->nullable();
            $table->string('attendance_uploaded')->nullable();
            $table->timestamp('attendance_uploaded_at')->nullable();
            $table->string('evaluation_uploaded')->nullable();
            $table->timestamp('evaluation_uploaded_at')->nullable(); 
            $table->string('terminal_uploaded')->nullable();
            $table->timestamp('terminal_uploaded_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

