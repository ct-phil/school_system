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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->bigIncrements('lecturer_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('sex');
            $table->string('email')->unique();
            $table->date('dob');
            $table->longText('address');
            $table->string('nationality');
            $table->date('dateregistered');
            $table->integer('user_id');
            $table->string('image')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('lecturers');
    }
};
