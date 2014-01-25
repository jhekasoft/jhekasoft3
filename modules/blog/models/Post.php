<?php

namespace app\modules\blog\models;

/**
 * This is the model class for table "jh3_post".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $text
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%post}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['slug', 'title', 'text', 'created_at'], 'required'],
			[['text'], 'string'],
			[['status'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['slug', 'title'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'slug' => 'Slug',
			'title' => 'Title',
			'text' => 'Text',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}
}
