<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeColumnsOfArticlesTsble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('body');
            $table->dropColumn('category_id');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->text('body');
            $table->integer('category_id');
            $table->text('discription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->text('body');
            $table->string('category_id');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('body');
            $table->dropColumn('category_id');
            $table->dropColumn('discription');
        });
    }
}
