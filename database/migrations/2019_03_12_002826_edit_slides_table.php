<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::table('slides', function (Blueprint $table) {
                $table->dropColumn('fields');
                $table->text('html')->after('slug');
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
        DB::transaction(function () {
            Schema::table('slides', function (Blueprint $table) {
                $table->dropColumn('html');
                $table->json('fields')->after('slug');
            });
        });
    }
}
