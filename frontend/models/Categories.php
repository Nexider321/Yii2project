<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $categoryName
 * @property string|null $type
 *
 * @property Workers $id0
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryName'], 'string', 'max' => 32],
            [['type'], 'integer', 'max' => 1],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryName' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Workers::class, ['id' => 'id']);
    }


    public function getIncomes()
    {
        return $this->hasMany(Incomes::class, ['category_id' => 'id']);
    }
    public function getExpenses()
    {
        return $this->hasMany(Expenses::class, ['category_id' => 'id']);
    }



}
