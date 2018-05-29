<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180528_234947_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'post_id' => $this->integer(),
            'body' => $this->text()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-comment-user-id',
            'comments',
            'user_id',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk-comment-post-id',
            'comments',
            'post_id',
            'posts',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-comment-user-id',
            'comments');
        $this->dropForeignKey(
            'fk-comment-post-id',
            'comments');
        $this->dropTable('comments');
    }
}
