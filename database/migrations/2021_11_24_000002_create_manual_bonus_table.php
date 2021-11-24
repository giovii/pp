<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualBonusTable extends Migration
{
    public function up()
    {
        Schema::create('manual_bonus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('value', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
