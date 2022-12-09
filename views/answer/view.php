<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Answer $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['/lesson/index']];
$this->params['breadcrumbs'][] = ['label' => $model->question->lesson->title, 'url' => ['/lesson/view', 'id' => $model->question->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/lesson/update', 'id' => $model->question->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => $model->question->title, 'url' => ['/question/view', 'id' => $model->question->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/question/update', 'id' => $model->question->id]];

$this->params['breadcrumbs'][] = ['label' => 'Answers','url' => ['/answer/index', 'question_id' => $model->question->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="answer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'isCorrect',
            'question_id',
        ],
    ]) ?>

</div>
