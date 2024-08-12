<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("title", 150);
            $table->string("thumbnail", 255)->nullable();
            $table->string("phone", 20)->nullable();
            $table->string("mail", 255)->nullable();
            $table->text("description");
            $table->dateTime("datetime_begin")->nullable();
            $table->dateTime("datetime_end")->nullable();
            $table->string("address", 255);
            $table->string("location_map", 255)->nullable();
            $table->boolean("publish_events", 1)->default(true);
            $table->boolean("situation", 1)->default(true);
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
        Schema::dropIfExists('events');
    }
}
