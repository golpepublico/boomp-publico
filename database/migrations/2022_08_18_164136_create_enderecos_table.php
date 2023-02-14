<?php

use App\Enums\AddressType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uf', 2);
            $table->string('endereco', 100);
            $table->string('cidade', 100);
            $table->string('bairro', 100);
            $table->string('cep', 20);
            $table->string('numero', 10);
            $table->string('complemento', 50);
            $table->enum('tipo', AddressType::getValues())->default(AddressType::Cobranca);
            $table->morphs('enderecostable');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('uf')->references('sigla')->on('ufs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
