<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%roles}}`.
 */
class m200217_100547_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%roles}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->unique()->notNull()
        ]);

        $data = ['admin', 'user'];

        $this->batchInsert('roles', ['name'], [
            ['admin'],
            ['user']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%roles}}');
    }
}
