<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property int $id
 * @property string|null $type_expense
 * @property int|null $costs
 * @property int|null $id_worker
 *
 * @property Workers $workers
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['costs'], 'required', ],
            [['costs'], 'string'],
            [['type_expense'], 'required'],
            [['type_expense'], 'string', 'max' => 32, ],
            [['category_id'], 'integer']];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_expense' => 'Name Expense',
            'costs' => 'Costs',
            'category_id' => 'Categories',

        ];
    }

    /**
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasOne(Workers::class, ['id' => 'category_id']);
    }

    public function getCategories()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);

    }
}
