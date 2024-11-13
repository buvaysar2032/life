<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m241113_065628_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->string()->notNull(),
            'link' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->comment('Дата изменения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown(): void
    {
        $this->dropTable('{{%news}}');
    }
}
