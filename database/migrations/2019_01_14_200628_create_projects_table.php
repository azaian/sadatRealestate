<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default(' ');
            ;
            $table->longText('description');
            $table->string('image')->default(' ');
            $table->string('price')->default(' ');
            $table->string('area')->default(' ');
            $table->string('address')->default(' ');
            $table->string('lat')->default(0);
            $table->string('lng')->default(0);
            $table->string('view')->default(0);
            $table->string('active')->default(1);
            $table->softDeletes();

            $table->integer('projectcategory_id')->unsigned();
            $table->foreign('projectcategory_id')->references('id')->on('projectcategories')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
