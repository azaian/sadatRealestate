<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainsettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobilenumber')->default(0)->nullable();
            $table->string('address')->default(' ')->nullable();
            $table->string('email')->default(0)->nullable();
            $table->string('facebookurl')->default(0)->nullable();
            $table->string('twitterurl')->default(0)->nullable();
            $table->string('googleplusurl')->default(0)->nullable();
            $table->string('video')->default(0)->nullable();
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
        Schema::dropIfExists('mainsettings');
    }
}
