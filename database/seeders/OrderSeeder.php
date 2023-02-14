<?php

namespace Database\Seeders;

use App\Enums\BillingType;
use App\Enums\StatusOrderType;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'store_id' => 1,
            'customer_id' => 1,
            'product_id' => 1,
            'payment_id_asaas'=>'pay_3653677447104058',
            'billingType'=> BillingType::BOLETO(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 7799.00,
            'status' => StatusOrderType::PENDENTE(),
        ]);

        Order::create([
            'store_id' => 1,
            'customer_id' => 1,
            'product_id' => 1,
            'payment_id_asaas'=>'pay_3653677447377007',
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 7799.00,
            'status' => StatusOrderType::PAGO(),
        ]);

        Order::create([
            'store_id' => 1,
            'customer_id' => 1,
            'product_id' => 2,
            'payment_id_asaas'=>'pay_3653677447377894',
            'billingType'=> BillingType::BOLETO(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 4499.00,
            'status' => StatusOrderType::PENDENTE(),
        ]);

        Order::create([
            'store_id' => 1,
            'customer_id' => 2,
            'product_id' => 5,
            'payment_id_asaas'=>'pay_3653677447315157',
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 2799.00,
            'status' => StatusOrderType::PAGO(),
        ]);

        Order::create([
            'store_id' => 1,
            'customer_id' => 3,
            'product_id' => 4,
            'payment_id_asaas'=>'pay_3653674473758479',
            'billingType'=> BillingType::BOLETO(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 4499.00,
            'status' => StatusOrderType::PAGO(),
        ]);

        Order::create([
            'store_id' => 1,
            'customer_id' => 3,
            'product_id' => 6,
            'payment_id_asaas'=>'pay_3653677447373734',
            'billingType'=> BillingType::PIX(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 250.00,
            'status' => StatusOrderType::PAGO(),
        ]);

        Order::create([ // Compra a vista com cartão de crédito
            'store_id' => 3,
            'customer_id' => 4,
            'product_id' => 14,
            'payment_id_asaas'=>'pay_3653677447373381',
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 289.00,
            'status' => StatusOrderType::PAGO(),
        ]);
        
        Order::create([ // Compra Parcelada em 5x
            'store_id' => 3,
            'customer_id' => 4,
            'product_id' => 14,
            'payment_id_asaas'=>'pay_3653604587673111',
            "installment" => "dd104094-c77e-447f-8083-093884757440",
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 303.45,
            'status' => StatusOrderType::PENDENTE(),
            "netValue" => 296.95,
            "installmentValue" => 60.69,
            "installmentCount" => '5',
        ]);

        Order::create([ // Compra a vista com cartão de crédito
            'store_id' => 2,
            'customer_id' => 4,
            'product_id' => 14,
            'payment_id_asaas'=>'pay_3653677447309874',
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 300.00,
            'status' => StatusOrderType::PAGO(),
        ]);

        Order::create([ // Compra Parcelada em 5x
            'store_id' => 2,
            'customer_id' => 4,
            'product_id' => 14,
            'payment_id_asaas'=>'pay_3653604587673111',
            "installment" => "dd104094-c77e-447f-8083-093884757440",
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 300.00,
            'status' => StatusOrderType::PAGO(),
            "netValue" => 296.95,
            "installmentValue" => 60.69,
            "installmentCount" => '5',
        ]);

        Order::create([ // Compra Parcelada em 5x
            'store_id' => 2,
            'customer_id' => 4,
            'product_id' => 14,
            'payment_id_asaas'=>'pay_3653604587754910',
            "installment" => "dd104094-c77e-447f-8083-093884757440",
            'billingType'=> BillingType::CREDIT_CARD(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 300.00,
            'status' => StatusOrderType::PENDENTE(),
            "netValue" => 296.95,
            "installmentValue" => 60.69,
            "installmentCount" => '5',
        ]);

        Order::create([
            'store_id' => 2,
            'customer_id' => 4,
            'product_id' => 14,
            'payment_id_asaas'=>'pay_3653674473751234',
            'billingType'=> BillingType::BOLETO(),
            'uuid' =>  Str::uuid()->toString(),
            'value' => 4499.00,
            'status' => StatusOrderType::PENDENTE(),
        ]);

        // Order::create([ // Compra a vista com cartão de crédito
        //     'store_id' => 2,
        //     'customer_id' => 4,
        //     'product_id' => 14,
        //     'payment_id_asaas'=>'pay_3653677447309874',
        //     'billingType'=> BillingType::CREDIT_CARD(),
        //     'uuid' =>  Str::uuid()->toString(),
        //     'value' => 300.00,
        //     'status' => StatusOrderType::CANCELADO(),
        // ]);
    }
}
