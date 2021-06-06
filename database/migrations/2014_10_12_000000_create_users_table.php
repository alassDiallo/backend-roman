<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profil');
            $table->string('phraseaudio')->nullable();
            $table->string('texte')->nullable();
            $table->string('sexe')->nullable();
            $table->date('dateDeNaissance')->nullable();
            $table->string('ville')->nullable();
            $table->string('enfant')->nullable();
            $table->integer('nombreEnfant')->nullable();
            $table->string('artiste')->nullable();
            $table->string('serie')->nullable();
            $table->string('loisir')->nullable();
            $table->string('sortir')->nullable();
            $table->integer('nombreLike')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
