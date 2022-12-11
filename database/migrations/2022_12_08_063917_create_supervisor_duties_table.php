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
        Schema::create('supervisor_duties', function (Blueprint $table) {
            $table->id();
            $table->integer('advisor_id');
            $table->integer('week_id');
            $table->integer('supervisor_id');
            $table->integer('points');
            $table->enum('follow_up_post',['published','didnt publish','published instead','incomplete']);
            $table->enum('mark_problems_post',['published','didnt publish','published instead','incomplete']);
            $table->enum('news',['published','didnt publish','incomplete']);
            $table->enum('thursday_task',['done','not done','incomplete']);
            $table->enum('final_mark_post',['published','didnt publish','incomplete']);
            $table->enum('about_asboha_post',['published','didnt publish','incomplete']);            
            $table->enum('supervisor_reading',['read','not read','incomplete', 'late', 'didnt vote']);
            $table->text('withdrawn_ambassadors_post');
            $table->text('new_ambassadors_post');
            $table->text('returning_ambassadors_post');
            $table->integer('team_final_mark');
            $table->integer('leader_members');
            $table->integer('frozen_ambassadors');

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
        Schema::dropIfExists('supervisor_duties');
    }
};
