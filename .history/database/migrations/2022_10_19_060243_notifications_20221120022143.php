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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->foreignId('inventory_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('work_id')->nullable();
            $table->foreignId('staff_id');
            $table->longtext('detail');
            $table->timestamps();
            $table->foreign('inventory_id')->references('id')->on('inventorys');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('work_id')->references('id')->on('works');
            $table->foreign('staff_id')->references('id')->on('users');
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
