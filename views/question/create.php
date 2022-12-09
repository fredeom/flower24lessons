<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Question $model */

$this->title = 'Create Question';
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['/lesson/index']];
$this->params['breadcrumbs'][] = ['label' => $model->lesson->title, 'url' => ['/lesson/view', 'id' => $model->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/lesson/update', 'id' => $model->lesson->id]];

$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['/question/index', 'lesson_id' => $model->lesson->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
