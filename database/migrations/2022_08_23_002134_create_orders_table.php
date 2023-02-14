<?php

use App\Enums\MethodPaymentType;
use App\Enums\StatusOrderType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('status', 1)->default(StatusOrderType::PRECART);
            $table->string('invoiceUrl')->nullable();
            $table->string('payment_id_asaas', 30)->nullable();
            $table->string('payment_id_moip', 30)->nullable();
            $table->string('installment', 36)->nullable(); // id de compras feitas de forma parcelado com cartão de crédito na asaas
            $table->string('billingType', 1)->nullable();
            $table->string('installmentCount', 2)->nullable(); // quantidade de parcelas
            $table->decimal('value', 8, 2)->default(0); // valor total já incluso percentual em caso de parcelamento
            $table->decimal('netValue', 8, 2)->default(0); // valor a receber já com o desconto da assas
            $table->decimal('installmentValue', 8, 2)->default(0); // valor de cada parcela
            $table->string('path_file', 60)->nullable();
            $table->string('uuid', 80);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
