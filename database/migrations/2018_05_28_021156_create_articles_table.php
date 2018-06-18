<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category_id')->default(0)->comment('所属分类ID');
            $table->string('author', 50)->default('')->comment('作者');
            $table->string('title')->default('')->comment('标题');
            $table->string('cover')->default('')->comment('封面图');
            $table->mediumText('content')->comment('转成html');
            $table->mediumText('markdown')->comment('markdown原始内容');
            $table->text('describe')->comment('描述');
            $table->boolean('is_top')->default(0)->comment('是否置顶 0否  1是');
            $table->integer('readed')->default(0)->comment('阅读量');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
