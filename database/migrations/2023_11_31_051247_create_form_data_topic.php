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
        Schema::create('form_data_topic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_data_id');
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();

            $table->foreign('form_data_id')->references('id')->on('form_data')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_data_topic');
    }
};
