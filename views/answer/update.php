<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Answer $model */

$this->title = 'Update Answer: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['/lesson/index']];
$this->params['breadcrumbs'][] = ['label' => $model->question->lesson->title, 'url' => ['/lesson/view', 'id' => $model->question->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/lesson/update', 'id' => $model->question->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => $model->question->title, 'url' => ['/question/view', 'id' => $model->question->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/question/update', 'id' => $model->question->id]];

$this->params['breadcrumbs'][] = ['label' => 'Answers','url' => ['/answer/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="answer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
