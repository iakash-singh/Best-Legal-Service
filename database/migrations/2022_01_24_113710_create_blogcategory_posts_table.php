<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogcategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcategory_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->index();
            $table->unsignedBigInteger('blog_category_id')->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('blogcategory_posts');
    }
}
