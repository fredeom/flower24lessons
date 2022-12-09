<?php

use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
};


$this->title = 'Survey';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/admin/users']];
$this->params['breadcrumbs'][] = ['label' => 'Уроки для ' . $user->username, 'url' => ['/study/index', 'user_id' => $user->id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<iframe width="560" height="315" src="<?php echo getYoutubeEmbedUrl($lesson->videourl) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<div class="container">
  <div class="row">
    Оценка: <?= $score ?> / <?= $max ?>
  </div>
  <?php if ($user->id == Yii::$app->user->identity->id): ?>
    <?php $form = ActiveForm::begin(['id' => 'result-form']); ?>
      <?php foreach ($lesson->questions as $question): ?>
      <div class="row mt-2">
        <?= $question->title ?>
        <?php if ($question->multiple): ?>
          <?php 
             echo $form->field($model, 'answers[' . $question->id . '][]')->checkboxList(ArrayHelper::map($question->answers, 'id', 'title'))->label(false);
          ?>
        <?php else: ?>
          <?php
             echo $form->field($model, 'answers[' . $question->id . '][]')->radioList(ArrayHelper::map($question->answers, 'id', 'title'))->label(false);
          ?>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    
      <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
          <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
      </div>

    <?php ActiveForm::end(); ?>
  <?php endif; ?>
</div>
