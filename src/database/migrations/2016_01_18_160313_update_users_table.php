<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->boolean('confirmed')->defaut(false);
            $table->boolean('notify')->default(false);
            $table->string('confirmation_token');
            $table->boolean('avatar')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('confirmed');
            $table->dropColumn('notify');
            $table->dropColumn('confirmation_token');
            $table->dropColumn('avatar');
        });
    }
}
