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
        Schema::create('workorders', function (Blueprint $table) {
            $table->id();
            $table->string('workorder_name');
            $table->foreignId('production_id');
            $table->string('status')->default('new');
            $table->foreignId('planner_id');
            $table->date('due_date');
            $table->integer('completion')->default('0');
            $table->longtext('planner_remark')->nullable()->default(NULL);
            $table->timestamps();
            $table->foreign('production_id')->references('id')->on('productions')->onDelete('cascade');
            $table->foreign('planner_id')->references('id')->on('users');
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
