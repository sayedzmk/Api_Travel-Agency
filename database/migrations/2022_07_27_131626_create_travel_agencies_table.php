<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('legel_no');
            $table->integer('bank_account');
            $table->string('phone');
            $table->string('address');
            $table->string('password');
            $table->string('image');
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
        Schema::dropIfExists('travel_agencies');
    }
}
