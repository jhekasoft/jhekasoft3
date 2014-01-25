<?php

namespace app\modules\blog\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\blog\models\Post;

/**
 * SearchPost represents the model behind the search form about Post.
 */
class SearchPost extends Model
{
	public $id;
	public $slug;
	public $title;
	public $text;
	public $status;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id', 'status', 'created_at', 'updated_at'], 'integer'],
			[['slug', 'title', 'text'], 'safe'],
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

	public function search($params)
	{
		$query = Post::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'slug', true);
		$this->addCondition($query, 'title', true);
		$this->addCondition($query, 'text', true);
		$this->addCondition($query, 'status');
		$this->addCondition($query, 'created_at');
		$this->addCondition($query, 'updated_at');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
