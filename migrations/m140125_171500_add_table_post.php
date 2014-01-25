<?php

use yii\db\Schema;

class m140125_171500_add_table_post extends \yii\db\Migration
{
	public function up()
	{
		$this->createTable('{{%post}}', [
			'id' => Schema::TYPE_PK,
			'slug' => Schema::TYPE_STRING . ' NOT NULL',
			'title' => Schema::TYPE_STRING . ' NOT NULL',
			'text' => Schema::TYPE_TEXT . ' NOT NULL',

			'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
		]);
	}

	public function down()
	{
		$this->dropTable('{{%post}}');
	}
}
