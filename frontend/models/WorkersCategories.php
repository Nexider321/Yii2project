<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workers_categories".
 *
 * @property string|null $categoryId
 * @property string|null $workerId
 * @property string|null $expenseId
 * @property string|null $incomeId
 */
class WorkersCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryId', 'workerId', 'expenseId', 'incomeId'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'workerId' => 'Worker ID',
            'expenseId' => 'Expense ID',
            'incomeId' => 'Income ID',
        ];
    }


    public function getCategories()
    {
        return $this->hasOne(Categories::class, ['id' => 'categoryId']);

    }

    public function getIncomes()
    {
        return $this->hasOne(Incomes::class, ['id' => 'incomeId']);

    }
    public function getExpenses()
    {
        return $this->hasOne(Expenses::class, ['id' => 'expenseId']);

    }

    public function getWorkers()
    {
        return $this->hasOne(Workers::class, ['id' => 'workerId']);
    }
}
