<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_sends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->text('template')->nullable();
            $table->timestamps();
        });

        Schema::create('email_send_individuals', function (Blueprint $table) {
            $table->unsignedBigInteger('email_send_id');
            $table->foreign('email_send_id')->references('id')->on('email_sends')->onDelete('cascade');
            $table->unsignedBigInteger('email_list_id');
            $table->foreign('email_list_id')->references('id')->on('email_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_sends');
    }
}
