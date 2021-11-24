<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('real_money', 15, 2)->nullable();
            $table->decimal('virtual_money', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
