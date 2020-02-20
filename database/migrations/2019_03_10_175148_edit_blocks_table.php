<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class EditBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::table('blocks', function (Blueprint $table) {
                $table->dropColumn('data');
                $table->string('group')->nullable()->after('name');
                $table->text('html')->nullable()->after('group');
                $table->json('fields')->nullable()->after('html');
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
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropColumn('group');
            $table->dropColumn('html');
            $table->dropColumn('fields');

            $table->json('data')->after('name');
        });
    }
}
