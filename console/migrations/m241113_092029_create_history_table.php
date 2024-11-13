<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 */
class m241113_092029_create_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'accusation' => $this->string(),
            'full_name' => $this->string(),
            'add_information' => $this->string(),
            'image_desktop' => $this->string(),
            'image_mobile' => $this->string(),
            'history' => $this->text(),
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
        $this->dropTable('{{%history}}');
    }
}
