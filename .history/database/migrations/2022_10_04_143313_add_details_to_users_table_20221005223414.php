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
            $table->string('fullname')->nullable();
            $table->string('contactnum')->nullable();
            $table->string('position')->nullable();
            $table->longtext('desc')->nullable();
        });

        https://lasanthabuddhika.wordpress.com/2020/11/01/laravel-how-to-add-mediumblob-longblob-data-fields-to-migrations/#:~:text=DB%3A%3Astatement(%22ALTER%20TABLE%20files%20ADD%20filedata%20MEDIUMBLOB%22)%3B
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
