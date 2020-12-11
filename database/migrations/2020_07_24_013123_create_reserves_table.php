<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreignId('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreignId('lodging_id')->references('id')->on('lodgings')->onDelete('cascade');
            $table->date('date');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('reserves');
    }
}
