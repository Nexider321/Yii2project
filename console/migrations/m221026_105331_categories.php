<?php

use yii\db\Migration;

/**
 * Class m221026_105331_category
 */
class m221026_105331_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'categoryName' => $this->string(32),
            'type' => $this->char(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221026_105331_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221026_105331_category cannot be reverted.\n";

        return false;
    }
    */
}
