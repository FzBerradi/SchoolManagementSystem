<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('street_addr_1')->nullable();
            $table->string('street_addr_2')->nullable();
            $table->string('phone_number')->nullable();
            $table->bigInteger('pin_code')->nullable();
            $table->string('linkdin_url')->nullable();
            $table->string('CIN')->nullable();
            $table->unsignedBigInteger('user_id');
            //$table->foreignId('user_id')->cascade('delete');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_profiles');
    }
}
