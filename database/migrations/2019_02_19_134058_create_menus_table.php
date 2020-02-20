<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {

            Schema::create('menus', function (Blueprint $table) {
                $table->increments('id');
                $table->string('label');
                $table->string('url');
                $table->string('type');
                $table->integer('order');
                $table->integer('parent_id')->unsigned()->nullable();
                $table->timestamps();
            });

            Schema::table('menus', function (Blueprint $table){
                $table->foreign('parent_id')->references('id')->on('menus');
            });

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
