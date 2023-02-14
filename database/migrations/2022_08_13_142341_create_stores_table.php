<?php

use App\Enums\StatusType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store')->unique();
            $table->string('slug')->unique();
            $table->string('url')->unique();
            $table->string('nomefatura', 100)->nullable();
            $table->string('dominioshopify', 100)->nullable();
            $table->string('apikeyapp', 100)->nullable();
            $table->string('passwordapp', 100)->nullable();
            $table->boolean('checkoutshopify')->default(false);
            $table->boolean('pulacarrinhoshopify')->default(false);
            $table->string('email', 100);
            $table->boolean('emailvalidado')->default(false);
            $table->boolean('permiteenvio')->default(false);
            $table->string('logo')->nullable();
            $table->boolean('mostralogocheckout')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
