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
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("province");
            $table->string("code");
            $table->dateTime("initdt");
            $table->dateTime("upddt");
            $table->unsignedBigInteger("initid");
            $table->unsignedBigInteger("updid");

            $table->foreign("initid")->references("id")->on("users");
            $table->foreign("updid")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
};
