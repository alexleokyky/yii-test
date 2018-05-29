<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m180528_234932_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(191)->notNull(),
            'body' => $this->text(),
            'image' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-posts-user-id',
            'posts',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-posts-user-id',
            'posts');
        $this->dropTable('posts');
    }
}
