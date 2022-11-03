<?php

use yii\db\Migration;

/**
 * Class m221031_092445_workers_categories
 */
class m221031_092455_workers_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('workers_categories', [
            'id' => $this->primaryKey(),
            'categoryId' => $this->char(8),
            'workerId' =>$this->char(8),
            'expenseId' => $this->char(8),
            'incomeId' => $this->char(8),
        ]);
        $this->alterColumn('workers_categories','id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221031_092445_workers_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221031_092445_workers_categories cannot be reverted.\n";

        return false;
    }
    */
}
