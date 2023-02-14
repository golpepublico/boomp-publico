<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('store_id')->unsigned()->nullable();
            $table->string('code', 50);
            $table->string('callbackurl');
            $table->string('methodtype', 5);
            $table->json('events')->nullable();
//            $table->boolean('precart')->default(false);
//            $table->boolean('awaitingpayment')->default(false);
//            $table->boolean('paymentsuccessful')->default(false);
//            $table->boolean('ordercanceled')->default(false);
//            $table->boolean('orderchargeback')->default(false);
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postbacks');
    }
}
