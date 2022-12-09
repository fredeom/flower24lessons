<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Lesson;
use app\models\SurveyForm;
use app\models\Survey;
use app\models\Result;
use app\models\User;

class StudyController extends Controller {
    public function actionIndex($user_id) {
       $lessons = Lesson::find()->all();
       $user = User::findOne($user_id);
       return $this->render('index', compact('lessons', 'user'));
    }
    
    public function actionTest($user_id, $lesson_id) {
       $user = User::findOne($user_id);
       $lesson = Lesson::findOne($lesson_id);
       $survey = Survey::findOne(['user_id' => $user_id, 'lesson_id' => $lesson->id]);
       $model = new SurveyForm();
       $score = 0;
       $max = 0;
       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           if (is_null($survey)) {
               $survey = new Survey();
               $survey->user_id = $user_id;
               $survey->lesson_id = $lesson->id;
               $survey->save();
           }
           Result::deleteAll(['survey_id' => $survey->id]);
           foreach ($model->answers as $question => $ansIds) {
               foreach ($ansIds as $ansId) {
                  if ($ansId) {
                      $result = new Result();
                      $result->question_id = $question;
                      $result->answer_id = $ansId;
                      $result->survey_id = $survey->id;
                      $result->save();
                  }
               }
           }
           return $this->refresh();
       } else {
           if (!is_null($survey)) {
               $model->answers = [];
               foreach ($survey->results as $result) {
                   if (empty($model->answers[$result->question_id])) {
                       $model->answers[$result->question_id] = [];
                   }
                   $model->answers[$result->question_id][] = $result->answer_id;
                   $score += $result->answer->isCorrect ? 1 : -1;
               }
           }
           foreach ($lesson->questions as $question) {
               foreach ($question->answers as $answer) {
                   $max += $answer->isCorrect ? 1 : 0;
               }
           }
       }
       return $this->render('test', compact('lesson', 'model', 'user', 'score', 'max'));
    }
}
