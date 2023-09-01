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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('ssn',false,true)->primary();
            $table->string('fname',50);
            $table->string('lname',50);
            $table->string('email',50);
            $table->string('username',50);
            $table->enum('gender',['m','f'])->default('m');
            $table->tinyInteger('dno',false,true);
            $table->foreign('dno')->references('dno')->on('departments');
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
        Schema::dropIfExists('students');
    }
};
