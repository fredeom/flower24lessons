<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UserGradeTeacherForm extends Model
{
    public $user_id;
    public $grade_id;
    public $teacher_id;

    public function rules() {
        return [[['user_id', 'grade_id', 'teacher_id'], 'required']];
    }
}
