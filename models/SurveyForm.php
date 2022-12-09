<?php

namespace app\models;

use yii;
use yii\base\Model;


class SurveyForm extends Model
{
    public $answers = [];
    
    public function rules() {
        return [
           ['answers', 'required']
        ];
    }
}
