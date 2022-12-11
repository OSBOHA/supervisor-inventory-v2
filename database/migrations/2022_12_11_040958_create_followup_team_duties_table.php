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
        Schema::create('followup_team_duties', function (Blueprint $table) {
            $table->id();
            $table->integer('leader_id');
            $table->integer('week_id');
            $table->integer('supervisor_id');
            $table->integer('user_id');
            $table->enum('follow_up_post',['published','didnt publish','published instead','incomplete']);
            $table->enum('about_asboha_post',['published','didnt publish','published instead','incomplete']);
            $table->enum('news',['published','didnt publish','incomplete']);
            $table->enum('friday_task',['done','not done','incomplete']);
            $table->enum('thursday_task',['done','not done','incomplete']);
            $table->enum('final_mark',['published','didnt publish','published instead','incomplete']);
            $table->enum('audit_final_mark',['done','not done','untargeted']);
            $table->enum('withdrawn_ambassadors',['done','not done','no withdrawal']);
            $table->enum('leader_reading',['read','not read','incomplete', 'late', 'didnt vote']);
            $table->integer('team_final_mark');
            $table->integer('team_members');
            $table->integer('frozen_ambassadors');
            $table->integer('points');
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
        Schema::dropIfExists('followup_team_duties');
    }
};
