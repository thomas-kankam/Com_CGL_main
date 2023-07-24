<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_email')->nullable();
            $table->string('action')->nullable();
            $table->string('other')->nullable();
            $table->string('location')->nullable();
            $table->string('incoming_cable')->nullable();
            $table->string('incoming_buffer')->nullable();
            $table->string('incoming_core')->nullable();
            $table->string('outgoing_cable')->nullable();
            $table->string('outgoing_buffer')->nullable();
            $table->string('outgoing_core')->nullable();
            $table->timestamps();

            //FOREIGN KEY
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
        Schema::dropIfExists('entries');
    }
}
