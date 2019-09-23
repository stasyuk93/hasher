<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hash_words', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('word_id')->unsigned();
            $table->smallInteger('hash_id')->unsigned();
            $table->string('hash',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash_words');
    }
}
