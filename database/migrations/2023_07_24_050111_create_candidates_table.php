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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('phone');

            
            $table->unsignedBigInteger('identification_type_id');
            $table->foreign('identification_type_id')->references('id')->on('identification_types')->onDelete('cascade');

            $table->string('identification_number')->unique();

            $table->unsignedBigInteger('city_of_birth_id')->nullable();
            $table->foreign('city_of_birth_id')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedBigInteger('type_candidate_id');
            $table->foreign('type_candidate_id')
                ->references('id')
                ->on('type_candidates')
                ->onDelete('cascade');

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
        Schema::dropIfExists('candidates');
    }
};
