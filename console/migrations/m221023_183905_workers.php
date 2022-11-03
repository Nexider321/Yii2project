<?php

use yii\db\Migration;

/**
 * Class m221023_183905_workers
 */
class m221023_183905_workers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('workers', [
            'id' => $this->primaryKey(),
            'workerName' => $this->string(32),
        ]);
        $this->alterColumn('workers','id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221023_183905_workers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221023_183905_workers cannot be reverted.\n";

        return false;
    }
    */
}
