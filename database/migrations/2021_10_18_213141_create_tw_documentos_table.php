<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_documentos', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('S_Nombre',45);
            $table->tinyInteger('N_Obligatorio');
            $table->string('S_Descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_documentos');
    }
}
