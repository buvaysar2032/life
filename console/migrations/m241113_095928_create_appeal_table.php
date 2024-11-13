<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appeal}}`.
 */
class m241113_095928_create_appeal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%appeal}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->comment('Дата изменения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown(): void
    {
        $this->dropTable('{{%appeal}}');
    }
}
