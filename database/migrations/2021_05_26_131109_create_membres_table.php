<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')
                  ->references('id')
                  ->on('users');
            $table->string('photo')->nullable();
            $table->string('ville');
            $table->Date('dateDeNaissance');
            $table->string('vocal')->nullable();
            $table->string('vivreseule')->nullable();
            $table->string('texteprofil')->nullable();
            $table->string('loisir')->nullable();
            $table->string('artisteprefere')->nullable();
            $table->string('seriepreferer')->nullable();
            $table->string('enfant')->nullable();
            $table->integer('nbrenfant')->nullable();
            $table->string('sortir')->nullable();
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
        Schema::dropIfExists('membres');
    }
}
