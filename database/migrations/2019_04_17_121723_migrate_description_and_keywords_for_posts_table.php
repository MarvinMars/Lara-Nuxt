<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MigrateDescriptionAndKeywordsForPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('description', 'old_description');
            $table->renameColumn('keywords', 'old_keywords');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
        });

        $posts = DB::table('posts')->get();

        foreach ($posts as $post) {
            try {
                $keywords = $post->old_keywords ? json_decode($post->old_keywords, true) : [];

                if (is_array($keywords) && \Illuminate\Support\Arr::has($keywords, 'content')) {
                    DB::table('posts')->where('id', '=', $post->id)->update([
                        'keywords' => \Illuminate\Support\Arr::get($keywords, 'content', null),
                    ]);
                }
            } catch (\Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }

            try {
                $description = $post->old_description ? json_decode($post->old_description, true) : [];

                if (is_array($description) && \Illuminate\Support\Arr::has($description, 'content')) {
                    DB::table('posts')->where('id', '=', $post->id)
                        ->update([
                            'description' => \Illuminate\Support\Arr::get($description, 'content', null),
                        ]);
                }

            } catch (\Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
