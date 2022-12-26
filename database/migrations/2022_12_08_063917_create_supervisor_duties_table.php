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
            $table->integer('leader_members');
            $table->integer('team_final_mark');
            $table->enum('follow_up_post',['published','didnt publish','published instead','incomplete']);
            $table->enum('mark_problems_post',['published','didnt publish','published instead','incomplete']);            
            $table->text('returning_ambassadors_post');
            $table->text('new_ambassadors_post');
            $table->text('withdrawn_ambassadors_post');
            $table->enum('leader_training',['published','didnt publish','incomplete','none']);
            $table->enum('discussion_post',['published','didnt publish','incomplete','none']);
            $table->integer('points');
            $table->integer('extra_points');
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
