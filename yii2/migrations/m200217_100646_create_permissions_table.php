<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%permissions}}`.
 */
class m200217_100646_create_permissions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%permissions}}', [
            'user_id' => $this->integer()->notNull()->unsigned(),
            'role_id' => $this->integer()->notNull()->unsigned()
        ]);

        $this->createIndex(
            'idx-permissions-user_id',
            'permissions',
            'user_id'
        );

        $this->addForeignKey(
            'fk-permissions-user_id',
            'permissions',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-permissions-role_id',
            'permissions',
            'role_id'
        );

        $this->addForeignKey(
            'fk-permissions-role_id',
            'permissions',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );

        $this->insert('permissions', [
           'user_id' => 1,
           'role_id' => 1
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-permissions-user_id',
            'permissions'
        );

        $this->dropIndex(
            'idx-permissions-user_id',
            'permissions'
        );

        $this->dropForeignKey(
            'fk-permissions-role_id',
            'permissions'
        );

        $this->dropIndex(
            'idx-permissions-role_id',
            'permissions'
        );

        $this->dropTable('{{%permissions}}');
    }
}
