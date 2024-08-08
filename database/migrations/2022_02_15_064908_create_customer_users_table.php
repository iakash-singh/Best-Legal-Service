<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateCustomerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('add1')->nullable();
            $table->text('add2')->nullable();
            $table->text('gst')->nullable();
            $table->string('alt_mobile')->nullable();
            $table->string('mobile')->nullable();
            $table->text('country')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->boolean('email_verified')->default(0);
            $table->string('token');
            $table->boolean('agree')->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_expires_at')->nullable();
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
        Schema::dropIfExists('customer_users');
    }
}
