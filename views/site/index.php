<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';

?>

<?php if (Yii::$app->user->isGuest): ?>
   Залагинтесь
   <?php return; ?>
<?php endif ?>
<div class="site-index">
    <div class="body-content">
        <?php if (Yii::$app->user->identity->role == 'admin'): ?>
        <div class="row">
          <div class="col-md-2">
             <a href="<?= Url::to(['/lesson/index']) ?>" class="btn btn-success">Уроки по работе с ERP</a>
          </div>
        </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-2 mt-2">
             <a href="<?= Url::to(['/admin/users']) ?>" class="btn btn-success">Пользователи</a>
          </div>
        </div>
    </div>
</div>
