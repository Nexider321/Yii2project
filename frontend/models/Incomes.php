<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incomes".
 *
 * @property int $id
 * @property string|null $type_income
 * @property int|null $costs
 * @property int|null $id_worker
 *
 * @property Workers $workers
 */
class Incomes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'incomes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['costs', 'category_id'], 'required'],
            [['costs', 'category_id'], 'integer'],
            [['type_income'], 'required'],
            [['type_income'], 'string', 'max' => 32],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_income' => 'Type Income',
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
