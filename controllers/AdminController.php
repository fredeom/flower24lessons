<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Grade;
use app\models\UserGradeTeacherForm;

class AdminController extends Controller
{
    public function actionUsers() {
        $this->layout = '@app/views/layouts/main';

        $users = User::find()->all();
        $grades= Grade::find()->all();

        $model = new UserGradeTeacherForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           $userUpdate = User::findOne($model->user_id);
           $userUpdate->grade_id = $model->grade_id;
           $userUpdate->teacher_id = $model->teacher_id;
           $userUpdate->save();
           return $this->refresh();
        }
        return $this->render('users', compact('users', 'grades', 'model'));
    }
}
