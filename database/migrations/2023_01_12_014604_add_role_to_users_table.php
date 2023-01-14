<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /* Adding a new column to the table `users` with the name `role_as` and setting the default
            value to `0`. */
            $table->tinyInteger('role_as')->default(0)->comment('0 = user and 1= admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            /* Dropping the column `role_as` from the table `users`. */
            $table->dropColumn('role_as');
        });
    }
};
