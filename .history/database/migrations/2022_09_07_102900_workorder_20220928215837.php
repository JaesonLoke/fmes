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
            $table->string('production_id');
            $table->string('status')->default('new');
            $table->integer('planner_id');
            $table->date('due_date');
            $table->integer('completion')->default('0');
            $table->longtext('planner_remark')->nullable()->default(NULL);
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
