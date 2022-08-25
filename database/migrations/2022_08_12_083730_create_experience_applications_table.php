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
        Schema::create('experience_applications', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->bigInteger('experience_id')->unsigned();
            $table->uuid('user_id');
            $table->timestamps();

            $table->foreign('experience_id')->references('id')->on('experiences');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience_applications');
    }
};
