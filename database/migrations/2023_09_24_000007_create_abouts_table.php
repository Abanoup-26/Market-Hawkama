<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone');
            $table->string('email');
            $table->string('location');
            $table->string('whatsapp');
            $table->string('instagram');
            $table->string('twitter');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
