<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_project', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_9045752')->references('id')->on('payments')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_9045752')->references('id')->on('projects')->onDelete('cascade');
            $table->decimal('donation_amount', 10, 2); 
        });
    }
}