<?php
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */

$this->title = 'About';
$this->params['breadcrumbs'][] = ['label' => 'System', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
	<h2>Revolute</h2>
</p>

<p>
	Version <?= $version; ?>
</p>
