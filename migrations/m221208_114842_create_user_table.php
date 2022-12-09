<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m221208_114842_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'authKey' => $this->string(),
            'role' => $this->string(10)->defaultValue("user"),
            'teacher_id' => $this->integer(),
            'grade_id' => $this->integer()
        ]);

        $this->createTable('{{%grade}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'weight' => $this->float()
        ]);

        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'videourl' => $this->string()->notNull(),
        ]);

        $this->createTable('{{%question}}', [
             'id' => $this->primaryKey(),
             'title' => $this->string(100)->notNull(),
             'multiple' => $this->boolean()->notNull(),
             'lesson_id' => $this->integer()
        ]);

        $this->createTable('{{%answer}}', [
             'id' => $this->primaryKey(),
             'title' => $this->string(100)->notNull(),
             'isCorrect' => $this->boolean()->notNull(),
             'question_id' => $this->integer()
        ]);

        $this->createTable('{{%survey}}', [
             'id' => $this->primaryKey(),
             'user_id' => $this->integer(),
             'lesson_id' => $this->integer()
        ]);

        $this->createTable('{{%result}}', [
             'id' => $this->primaryKey(),
             'survey_id' => $this->integer(),
             'question_id' => $this->integer(),
             'answer_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-user-teacher_id',
            'user',
            'teacher_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user-grade_id',
            'user',
            'grade_id',
            'grade',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-question-lesson_id',
            'question',
            'lesson_id',
            'lesson',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-answer-question_id',
            'answer',
            'question_id',
            'question',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-survey-user_id',
            'survey',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-survey-lesson_id',
            'survey',
            'lesson_id',
            'lesson',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-result-survey_id',
            'result',
            'survey_id',
            'survey',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-result-question_id',
            'result',
            'question_id',
            'question',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-result-answer_id',
            'result',
            'answer_id',
            'answer',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-teacher_id', 'user');
        $this->dropForeignKey('fk-user-grade_id', 'user');
        $this->dropForeignKey('fk-question-lesson_id', 'question');
        $this->dropForeignKey('fk-answer-question_id', 'answer');
        $this->dropForeignKey('fk-survey-user_id', 'survey');
        $this->dropForeignKey('fk-survey-lesson_id', 'survey');
        $this->dropForeignKey('fk-result-survey_id', 'result');
        $this->dropForeignKey('fk-result-question_id', 'result');
        $this->dropForeignKey('fk-result-answer_id', 'result');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%grade}}');
        $this->dropTable('{{%lesson}}');
        $this->dropTable('{{%question}}');
        $this->dropTable('{{%answer}}');
        $this->dropTable('{{%survey}}');
        $this->dropTable('{{%result}}');
    }
}
