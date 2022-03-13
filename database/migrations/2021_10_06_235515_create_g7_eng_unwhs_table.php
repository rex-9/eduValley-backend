<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateG7EngUnwhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g7_eng_unwhs', function (Blueprint $table) {
            $table->id();
            $table->string('MY')->unique();
            $table->integer('Y');
            $table->integer('students')->default(0);
            $table->integer('income')->default(0);
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
        Schema::dropIfExists('g7_eng_unwhs');
    }
}
