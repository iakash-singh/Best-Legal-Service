<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('ser_name');
            $table->text('title');
            $table->string('slug')->unique();
            $table->text('image')->nullable();
            $table->text('short_description')->nullable();
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->text('description');
            $table->integer('cat')->nullable();
            $table->unsignedBigInteger('sub_cat')->nullable();
            $table->foreign('sub_cat')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('price')->nullable();
            $table->boolean('status')->default('1');
            $table->integer('position')->nullable();
            $table->boolean('is_checked')->default('0')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        DB::statement(
            'ALTER TABLE services ADD FULLTEXT fulltext_index(ser_name)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
