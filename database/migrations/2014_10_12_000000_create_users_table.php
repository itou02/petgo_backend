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
            $table->uuid('id')->primary();
            // $table->id();
            $table->string('name', 10);
            $table->char('phone', 10);
            $table->string('email', 100)->unique();
            $table->date('birth');
            $table->char('sex', 1);
            $table->string('intro')->nullable();
            $table->string('line', 20)->nullable();
            $table->string('img')->nullable();
            $table->string('years', 5)->nullable();
            $table->string('amount', 5)->nullable();
            $table->string('animals', 100)->nullable();
            $table->string('space', 5)->nullable();
            $table->string('thoughts')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('location_id')->unsigned();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
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
