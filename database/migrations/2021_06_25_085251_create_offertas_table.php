<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offertas', function (Blueprint $table) {
           $table->id();
           $table->string('panstwo');
           $table->string('miasto');
           $table->integer('osoby');
           $table->integer('id_user');
           $table->float('cena');
           $table->longText('opis');
           $table->string('zdjecie')->nullable();
           $table->string('dostepnosc')->nullable();
           $table->string('id_additives')->nullable();
           $table->date('od')->nullable();
           $table->date('do')->nullable();
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
        Schema::dropIfExists('offertas');
    }
}
