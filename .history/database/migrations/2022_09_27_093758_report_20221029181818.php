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
            $table->foreignId('ProductID')->nullable();
            $table->foreignId('WorkID');
            $table->foreignId('ReporterID');
            $table->string('category');
            $table->longtext('detail');
            $table->foreignId('inventory_id')->nullable();
            $table->integer('wastedquantity')->nullable();
            $table->timestamps();
            $table->foreign('ProductID')->references('id')->on('products');
            $table->foreign('WorkID')->references('id')->on('workorders');
            $table->foreign('ReporterID')->references('id')->on('users');
            $table->foreign('inventory_id')->references('id')->on('inventorys');
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
