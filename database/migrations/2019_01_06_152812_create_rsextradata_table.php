<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsextradataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsextradata', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rs_id')->default(0);
            $table->unsignedInteger('cf_id')->default(0);
            $table->string('value')->default(' ');
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
        Schema::dropIfExists('rsextradata');
    }
}
