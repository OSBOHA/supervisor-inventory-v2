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
        Schema::create('supervisor_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('advisor_id');
            $table->integer('week_id');
            $table->integer('supervisor_id');
            $table->boolean('thursday_task');
            $table->boolean('final_mark_confirm');
            $table->boolean('final_mark_screenshot');
            $table->enum('supervisor_reading',['read','not read', 'late', 'didnt vote']);
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
        Schema::dropIfExists('supervisor_tasks');
    }
};
