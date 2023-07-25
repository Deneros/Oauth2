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
        Schema::create('home_infos', function (Blueprint $table) {
            $table->id();
            $table->string('welcome_title');
            $table->text('welcome_description');
            $table->string('program_title')->nullable();
            $table->text('program_description')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
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
        Schema::dropIfExists('home_infos');
    }
};
