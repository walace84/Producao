<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->unique();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('oferta');
            $table->string('valor');
            $table->string('newvalor');
            $table->string('desconto');
            $table->string('detalhes')->nullable();
            $table->string('endereco')->nullable();
            $table->string('regras')->nullable();
            $table->string('telefone', 32)->nullable();
            $table->string('whatsapp', 32)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('site')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('details');
    }
}
