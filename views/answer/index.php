<?php

use app\models\Answer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AnswerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['/lesson/index']];
$this->params['breadcrumbs'][] = ['label' => $question->lesson->title, 'url' => ['/lesson/view', 'id' => $question->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/lesson/update', 'id' => $question->lesson->id]];
$this->params['breadcrumbs'][] = ['label' => $question->title, 'url' => ['/question/view', 'id' => $question->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => ['/question/update', 'id' => $question->id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Answer', ['/answer/create', 'question_id' => $question->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'isCorrect',
            'question_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Answer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
