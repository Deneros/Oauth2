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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('housing_type_id')->nullable();
            $table->unsignedBigInteger('identification_type_id')->nullable();
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('housing_type_id')->references('id')->on('housing_types');
            $table->foreign('identification_type_id')->references('id')->on('identification_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
