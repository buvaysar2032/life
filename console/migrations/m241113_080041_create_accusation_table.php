<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%accusation}}`.
 */
class m241113_080041_create_accusation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%accusation}}', [
            'id' => $this->primaryKey(),
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
        $this->dropTable('{{%accusation}}');
    }
}
