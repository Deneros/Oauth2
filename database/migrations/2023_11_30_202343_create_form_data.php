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
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('identification_number')->unique();
            $table->unsignedBigInteger('identification_type_id');
            $table->foreign('identification_type_id')->references('id')->on('identification_types')->onDelete('cascade');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->unsignedBigInteger('housing_type_id')->nullable();
            $table->foreign('housing_type_id')->references('id')->on('housing_types')->onDelete('cascade');
            $table->date('date_of_birth');
            $table->unsignedBigInteger('city_of_birth_id')->nullable();
            $table->foreign('city_of_birth_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('nationality');

            $table->string('polling_station');
            $table->string('polling_address');
            $table->string('polling_place');
            $table->string('residence_address');
            $table->string('neighborhood');
            $table->unsignedBigInteger('place_of_residence_id')->nullable();
            $table->foreign('place_of_residence_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('cellphone');
            $table->integer('dependents')->nullable();
            $table->boolean('has_children');
            $table->integer('number_of_children')->nullable();
            $table->integer('children_living_with_you')->nullable();
            $table->integer('adult_children')->nullable();
            $table->boolean('voted_2022_congress_presidency')->nullable();
            $table->boolean('voted_2019_mayor_governor')->nullable();
            $table->boolean('registered_in_dagua')->nullable();
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->foreign('leader_id')->references('id')->on('leaders')->onDelete('cascade');
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
        Schema::dropIfExists('form_data');
    }
};
