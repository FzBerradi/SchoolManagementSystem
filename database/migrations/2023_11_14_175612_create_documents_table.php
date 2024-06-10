<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Documents', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained(); // Foreign key referencing the 'id' column of the 'users' table.
            $table->unsignedBigInteger('user_id');
            $table->string('type')->comment('Attestation de scolarité, Relevé de notes, Convention de stage');
            $table->string('file')->nullable();
            $table->string('refusal_reason')->nullable();
            $table->enum('status', ['accepted', 'pending', 'refused'])->default('pending');
            // Add more columns if needed.
            $table->foreign('user_id')->references('id')->on('user_profiles')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
