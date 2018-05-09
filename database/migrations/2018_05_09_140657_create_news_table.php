<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
                $table->string('titulo', '255');
                $table->string('autor', '120');
                $table->string('categoria', '120');
                $table->date('data');
                $table->string('banner', '255');
                $table->text('resumo');
                $table->text('conteudo');
                $table->enum('ativo', ['Sim', 'Não']);
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
        Schema::dropIfExists('news');
    }
}
