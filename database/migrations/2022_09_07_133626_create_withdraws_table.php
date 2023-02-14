<?php

use App\Enums\PaymentType;
use App\Enums\StatusWithdrawType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 1)->default(StatusWithdrawType::PENDENTE);
            $table->string('payment_type', 1)->default(PaymentType::AUTOMATICO);
            $table->decimal('value_withdraw', 8, 2)->nullable(false);
            $table->string('code', 6)->nullable(false);
            $table->dateTime('payment_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('withdraws');
    }
}
