<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMessagerie');
            $table->foreign('idMessagerie')
                    ->references('id')
                    ->on('messageries')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('type')->nullable();
            $table->integer('contenu');
            $table->dateTime('date')->nullable();
            $table->integer('sender_id');
            $table->integer('recipient_id');
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
        Schema::dropIfExists('messages');
    }
}
