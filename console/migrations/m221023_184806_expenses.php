<?php

use yii\db\Migration;

/**
 * Class m221023_184806_expenses
 */
class m221023_184806_expenses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expenses', [
            'id' => $this->primaryKey(),
            'type_expense' => $this->string(32),
            'costs' => $this->integer(),
            'id_worker' => $this->smallInteger(),


        ]);
        $this->alterColumn('expenses', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');

        $this->addForeignKey(
            'expenses_to_worker',
            'expenses',
            'id_worker',
            'worker',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221023_184806_expenses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221023_184806_expenses cannot be reverted.\n";

        return false;
    }
    */
}
