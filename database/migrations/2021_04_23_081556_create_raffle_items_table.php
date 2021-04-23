<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaffleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffle_items', function (Blueprint $table) {
            $table->id();
            $table->string("item");
            $table->string("sponsor");
            $table->decimal("value",8,2);
            $table->bigInteger('participant_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('participant_id')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raffle_items');
    }
}
