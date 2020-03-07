<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNotebooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('max_notes')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notebook_id')->unsigned();
            $table->string('title');
            $table->longText('description');
            $table->boolean('has_duedate');
            $table->date('duedate')->nullable();
            $table->smallInteger('status_id');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notebooks');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('status');
    }
}
