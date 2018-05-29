<?php

use yii\db\Migration;

/**
 * Class m180529_003449_alter_user_table_add_status
 */
class m180529_003449_alter_user_table_add_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('user', 'status', 'int');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'status');
        echo "m180529_003449_alter_user_table_add_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_003449_alter_user_table_add_status cannot be reverted.\n";

        return false;
    }
    */
}
