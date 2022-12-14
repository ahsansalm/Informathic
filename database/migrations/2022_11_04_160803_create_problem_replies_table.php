<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_replies', function (Blueprint $table) {
            $table->id();
            $table->string("userId");
            $table->string("productId");
            $table->string("problem")->nullable();
            $table->string("object")->nullable();
            $table->string("icon")->nullable();
            $table->string("answer")->nullable();
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
        Schema::dropIfExists('problem_replies');
    }
}
