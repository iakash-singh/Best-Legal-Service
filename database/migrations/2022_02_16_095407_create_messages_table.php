<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('customer_user_id');
            $table->unsignedBigInteger('CustTicket_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('customer_user_id')->references('id')->on('customer_users');
            $table->foreign('CustTicket_id')->references('id')->on('cust_tickets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->enum('type', ['customer', 'user'])->default('user');
            $table->text('file')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
