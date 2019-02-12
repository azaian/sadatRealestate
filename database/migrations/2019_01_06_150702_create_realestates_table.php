<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(' ');
            $table->string('phone_no')->default(' ');
            $table->string('whatsapp_no')->default(' ');
            $table->string('email')->default(' ')->nullable();
            $table->string('title')->default(' ');
            $table->string('type')->default(' ');
            $table->string('adminnote')->default(' ')->nullable();
            $table->string('rs_address')->default(' ')->nullable();
            $table->string('area')->default(' ');
            $table->string('price')->default(' ')->nullable();
            $table->unsignedInteger('negotiable')->default(0);
            $table->longText('details')->default(null)->nullable();
            $table->string('district')->default(' ')->nullable();
            $table->string('videourl')->default(' ')->nullable();
            $table->string('main_pic')->default(' ');
            $table->string('catch')->default(0);
            $table->string('approvement')->default(0);
            $table->string('available')->default(1);
            $table->double('lat')->default(0);
            $table->double('lng')->default(0);
            $table->unsignedInteger('cat_id')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('realestates');
    }
}
