<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('inv_id')->nullable();
            $table->unsignedBigInteger('tkt_id')->nullable();
            $table->foreign('tkt_id')->references('id')->on('cust_tickets')->onUpdate('cascade');
            $table->unsignedBigInteger('customer_user_id')->nullable();
            $table->foreign('customer_user_id')->references('id')->on('customer_users')->onUpdate('cascade');
            $table->text('cust_name')->nullable();
            $table->integer('inv_amt')->nullable();
            $table->string('gst')->nullable();
            $table->dateTime('inv_date')->nullable();
            $table->text('address')->nullable();
            $table->text('staticData')->nullable();
            $table->text('service_name')->nullable();
            $table->text('service_desc')->nullable();
            $table->integer('pay_via_rzpay')->nullable();
            $table->integer('inv_total_amt')->nullable();
            $table->text('terms_and_condi')->nullable();
            $table->text('staticBankData')->nullable();
            $table->string('razorpay_payment_id')->nullable();
            $table->string('rzpay_status')->default('UnPaid')->nullable();
            $table->string('order_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
