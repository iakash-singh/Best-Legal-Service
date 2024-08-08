<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCustTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_tickets', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->string('state');
            $table->text('cust_desc')->nullable();
            $table->enum('status', ['Opened', 'Closed'])->default('Opened');
            $table->unsignedBigInteger('customer_user_id')->index();
            $table->unsignedBigInteger('service_id')->index();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('customer_user_id')->references('id')->on('customer_users');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('admin_id');
            $table->text('assign_name')->nullable();
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
        Schema::dropIfExists('cust_tickets');
    }
}
