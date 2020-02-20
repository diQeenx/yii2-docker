<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200217_093036_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey()->unsigned(),
            'username' => $this->string(16)->notNull()->unique(),
            'auth_key' => $this->string(32),
            'email_confirm_token' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->insert('users', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'email_confirm_token' => null,
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'password_reset_token' => null,
            'email' => 'danilov.infobel@mail.ru',
            'status' => 1,
            'created_at' => $this->time(),
            'updated_at' => $this->time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
