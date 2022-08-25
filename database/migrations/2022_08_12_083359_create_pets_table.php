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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->char('variety', 10);
            $table->string('size', 4);
            $table->char('sex', 1);
            $table->string('age', 3);
            $table->string('start_date', 7);
            $table->string('end_date', 7)->nullable();
            $table->string('intro');
            $table->string('img');
            $table->string('remind');
            $table->char('ligation', 1);
            $table->string('hospital', 10);
            $table->string('hospital_address', 100);
            $table->string('contact_person', 10);
            $table->char('contact_phone', 10);
            $table->uuid('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
