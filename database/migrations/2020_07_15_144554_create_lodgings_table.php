<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLodgingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lodgings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url-photo')->default('url-photo-lodging.jpg');
            $table->string('description');
            $table->string('position');
            $table->double('price');
            $table->foreignId('tour_id')->references('id')->on('tours')->onDelete('cascade');
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
        Schema::dropIfExists('lodgings');
    }
}
