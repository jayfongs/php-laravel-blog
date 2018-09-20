<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author', 20)->comment('文章作者');
            $table->string('title', 50)->comment('文章标题');
            $table->string('article_img', 50)->comment('文章图片');
            $table->string('article_description')->comment('文章描述');
            $table->text('content')->comment('文章内容');
            $table->integer('article_view')->comment('文章查看次数');
            $table->string('tag')->comment('文章所属分类');
            $table->nullableTimestamps();
        });
        DB::statement('ALTER TABLE `article` COMMENT="文章表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
