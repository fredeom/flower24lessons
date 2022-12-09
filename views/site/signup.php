<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
]) ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<div class="form-group">
  <div class="mt-3">
    <?= Html::submitButton("Регистрация", ['class' => 'btn btn-success']) ?>
  </div>
</div>
<?php ActiveForm::end() ?>
