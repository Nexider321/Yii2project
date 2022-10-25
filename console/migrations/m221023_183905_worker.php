<?php

use yii\db\Migration;

/**
 * Class m221023_183905_worker
 */
class m221023_183905_worker extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('worker', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32),
        ]);
        $this->alterColumn('worker','id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221023_183905_worker cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221023_183905_worker cannot be reverted.\n";

        return false;
    }
    */
}
