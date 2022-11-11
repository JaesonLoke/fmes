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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('ProductOrWork');
            $table->string('ProductID')->nullable()->default(NULL);
            $table->string('WorkID');
            $table->string('ReporterID');
            $table->string('category');
            $table->longtext('detail');
            $table->string('inventory_id')->nullable()->default(NULL);
            $table->integer('wastedquantity')->nullable();
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
        //
    }
};
