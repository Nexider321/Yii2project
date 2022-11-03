<?php

use yii\db\Migration;

/**
 * Class m221023_185513_incomes
 */
class m221023_185514_incomes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('incomes', [
            'id' => $this->primaryKey(),
            'type_income' => $this->string(32),
            'costs' => $this->integer(),
            'category_id' => $this->smallInteger(),



        ]);
        $this->alterColumn('incomes', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221023_185513_incomes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221023_185513_incomes cannot be reverted.\n";

        return false;
    }
    */
}
