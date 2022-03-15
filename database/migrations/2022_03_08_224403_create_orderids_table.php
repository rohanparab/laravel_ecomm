<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderids', function (Blueprint $table) {
            $table->id();
            $table->string("oid");
            $table->string("uid");
            $table->integer("total");
            $table->string("pp");
            $table->string("address");
            $table->integer("delivered");
            $table->dateTime("datet");
            $table->string("coupon_code");
            $table->integer("coupon_amount");
            $table->integer("wallet");
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
        Schema::dropIfExists('orderids');
    }
};
