<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partner}}`.
 */
class m241113_083505_create_partner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'logo' => $this->string(),
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
        $this->dropTable('{{%partner}}');
    }
}
