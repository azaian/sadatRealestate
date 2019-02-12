<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryfeildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryfeilds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_id')->default(0);
            $table->string('fieldname')->default(' ');
            $table->string('fieldtype')->default(' ');
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
        Schema::dropIfExists('categoryfeilds');
    }
}
