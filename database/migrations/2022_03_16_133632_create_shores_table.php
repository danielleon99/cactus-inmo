<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("property_id");
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->string("name");
            $table->string("description", 255);
            $table->date("date");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shores');
    }
}
