<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_info}}`.
 */
class m200217_112655_create_user_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_info}}', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'position' => $this->string()->notNull(),
            'first_name' => $this->string(64)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'birthday' => $this->date()->notNull(),
            'mobile_phone' => $this->string()->null(),
            'home_phone' => $this->string()->null(),
            'country' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'created_at' => $this->date(),
            'updated_at' => $this->date()
        ]);

        $this->createIndex(
            'idx-user_info-user_id',
            'user_info',
            'user_id'
        );

        $this->addForeignKey(
            'fk-user_info-user_id',
            'user_info',
            'user_id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user_info-user_id',
            'user_info'
        );

        $this->dropIndex(
            'idx-user_info-user_id',
            'user_info'
        );

        $this->dropTable('{{%user_info}}');
    }
}
