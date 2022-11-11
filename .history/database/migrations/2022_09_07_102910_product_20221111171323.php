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
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('workorder_id');
            $table->string('status')->default('new');
            $table->string('operator_id')->nullable()->default(NULL);
            $table->string('planner_id')->nullable()->default(NULL);
            $table->integer('quantity');
            $table->integer('completion')->default('0');
            $table->date('due_date');
            $table->longtext('planner_remark')->nullable()->default(NULL);
            $table->longtext('operator_remark')->nullable()->default(NULL);
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
