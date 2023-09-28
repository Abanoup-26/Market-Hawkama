<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9036451')->references('id')->on('users');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_9045752')->references('id')->on('projects')->onDelete('cascade');
        });
    }
}