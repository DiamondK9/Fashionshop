<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('order_id')->default(0)->nullable();
            $table->string('product_id')->default(0)->nullable();
            $table->string('customer_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('customer_password');
            $table->tinyInteger("active")->default(1)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
