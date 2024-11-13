<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questionary}}`.
 */
class m241113_113454_create_questionary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%questionary}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(),
            'age' => $this->integer(),
            'city' => $this->string(),
            'status' => $this->integer(),
            'work' => $this->boolean(),
            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->comment('Дата изменения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown(): void
    {
        $this->dropTable('{{%questionary}}');
    }
}
