<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_orderid')->nullable();
            $table->string('donation_num')->nullable();
            $table->decimal('donation', 15, 2);
            $table->string('payment_status')->nullable();
            $table->string('payment_type');
            $table->boolean('completed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
