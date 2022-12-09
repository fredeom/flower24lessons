<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->params['breadcrumbs'][] = 'Lessons';

$currentUser = Yii::$app->user->identity;

$shownUsers = $users;

if ($currentUser->role == 'user') {
  $shownUsers = array_filter($users, function ($x) use ($currentUser) {
      return $x->teacher_id == $currentUser->id || $x->id == $currentUser->id;
  });
}
?>

<div class="container">
  <?php foreach ($shownUsers as $user): ?>
    <?php $form = ActiveForm::begin(['id' => 'user-grade-teacher-form']); ?>
    <div class="row mt-2">
        <?php
          $model->user_id = $user->id;
          echo $form->field($model, 'user_id')->hiddenInput()->label(false);
        ?>
        <div class="col-2">
          <a href="<?php echo Url::to(['/study/index', 'user_id' => $user->id]) ?>"><?= $user->username ?> уроки</a>
        </div>
        <div class="col-2">
          <?php
             $items = ArrayHelper::map($grades, 'id', 'title');
             $model->grade_id = $user->grade_id;
             echo $form->field($model, 'grade_id')->dropDownList($items, ['disabled' => $user->id == $currentUser->id ? 'disabled' : false])->label(false);
          ?>
        </div>
        <?php if ($currentUser->role == 'admin'): ?>
          <div class="col-1">
            Наставник:
          </div>
          <div class="col-2">
            <?php
               $items = ArrayHelper::map($users, 'id', 'username');
               $model->teacher_id = $user->teacher_id;
               echo $form->field($model, 'teacher_id')->dropDownList($items)->label(false);
            ?>
          </div>
        <?php else: ?>
          <div class="col-1">
           <?php
             $model->teacher_id = $user->teacher_id;
             echo $form->field($model, 'teacher_id')->hiddenInput()->label(false);
           ?>
          </div>
        <?php endif; ?>
        <div class="col-2">
          <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
  <?php endforeach ?>
  <div class="row mt-3">
   <div class="col-2">
     <a href="<?= Url::to(['/grade/index']) ?>" class="btn btn-success">Grades</a>
   </div>
  </div>
</div>
