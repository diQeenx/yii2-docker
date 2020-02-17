<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%time_tracking}}`.
 */
class m200217_113752_create_time_tracking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%time_tracking}}', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'date' => $this->date()->notNull(),
            'start_time' => $this->time()->notNull(),
            'end_time' => $this->time()->null(),
            'state' => $this->string(3)->notNull()->defaultValue('on')
        ]);

        $this->createIndex(
            'idx-time_tracking-user_id',
            'time_tracking',
            'user_id'
        );

        $this->addForeignKey(
            'fk-time_tracking-user_id',
            'time_tracking',
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
            'fk-time_tracking-user_id',
            'time_tracking'
        );

        $this->dropIndex(
            'idx-time_tracking-user_id',
            'time_tracking'
        );

        $this->dropTable('{{%time_tracking}}');
    }
}
