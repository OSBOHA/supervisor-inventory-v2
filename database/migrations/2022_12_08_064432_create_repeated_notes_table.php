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
        Schema::create('repeated_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('week_id');
            $table->integer('didnt_publish_news')->default(0);
            $table->integer('post_late')->default(0);
            $table->integer('deputized_for')->default(0);
            $table->integer('light_week')->default(0);
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
        Schema::dropIfExists('repeated_notes');
    }
};
