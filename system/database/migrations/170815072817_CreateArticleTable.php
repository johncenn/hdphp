<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateArticleTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'article', function ( Blueprint $table ) {
$table->increments( 'id' );
			$table->string( 'title', 100 );
			$table->tinyInteger( 'nums' )->unsigned();
			$table->char( 'name', 30 )->nullable()->defaults( '后盾网' )->comment( '这是注释' );
			$table->timestamps();
},'这是表注释');
		    
    }

    //回滚
    public function down() {
        Schema::drop( 'article' );
    }
}