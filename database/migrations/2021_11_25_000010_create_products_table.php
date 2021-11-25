<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('location')->nullable();
            $table->string('short_description')->nullable();
            $table->string('opportunity_code')->nullable();
            $table->decimal('maximum_target', 15, 2)->nullable();
            $table->decimal('minimum_target', 15, 2)->nullable();
            $table->integer('roi')->nullable();
            $table->datetime('start_founding')->nullable();
            $table->datetime('end_founding')->nullable();
            $table->string('risk')->nullable();
            $table->datetime('repayment')->nullable();
            $table->boolean('manager_prepay_invest')->default(0)->nullable();
            $table->boolean('prepay_invest')->default(0)->nullable();
            $table->string('email_owner')->nullable();
            $table->longText('section')->nullable();
            $table->string('financial_details')->nullable();
            $table->string('state')->nullable();
            $table->integer('bonus_multiplier')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
