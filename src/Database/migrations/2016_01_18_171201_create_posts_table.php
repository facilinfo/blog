<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog table
        Schema::create('posts', function(Blueprint $table)
        {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('body');
            $table->string('slug')->unique();
            $table->boolean('active')->default(false);
            $table->boolean('notification_sent')->default(false);
            $table->timestamps();
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->default(0);

        });

        Schema::table('posts',function(Blueprint $table){
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });

        DB::statement("ALTER TABLE posts ADD FULLTEXT (title, body)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the index before dropping the table
        Schema::table('posts', function($table) {
            $table->dropIndex('search', 'search2');
        });
        // drop blog table
        Schema::drop('posts');
    }
}
