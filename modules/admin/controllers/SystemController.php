<?php

namespace app\modules\admin\controllers;

class SystemController extends \yii\web\Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionAbout()
	{
		return $this->render('about', [
			'version' => '0.1',
		]);
	}
}
