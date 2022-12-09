<?php

use yii\helpers\Url;

$this->title = 'Уроки для ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/admin/users']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
  <?php foreach ($lessons as $lesson): ?>
    <div class="row">
      <a href="<?php echo Url::to(['/study/test', 'user_id' => $user->id, 'lesson_id' => $lesson->id ]) ?>"><?= $lesson->title ?></a>
    </div>
  <?php endforeach; ?>
</div>
