<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Grade $model */

$this->title = 'Update Grade: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['/admin/users']];
$this->params['breadcrumbs'][] = ['label' => 'Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
