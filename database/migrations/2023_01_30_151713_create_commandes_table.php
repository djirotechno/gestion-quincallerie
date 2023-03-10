<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
   
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('detail')->nullable();
            $table->integer('qt');
            $table->integer('user_id')->unsigned();
            $table->integer('qyt')->nullable();
            $table->integer('prix');
            $table->boolean('statut')->default(0);
            $table->integer('idprod');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
