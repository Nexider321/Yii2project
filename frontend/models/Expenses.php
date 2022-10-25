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
 * @property Worker $worker
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
            [['costs', 'id_worker'], 'required', ],
            [['costs', 'id_worker'], 'integer'],
            [['type_expense'], 'required'],
            [['type_expense'], 'string', 'max' => 32, ],
            [['id_worker'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::class, 'targetAttribute' => ['id_worker' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_expense' => 'Type Expense',
            'costs' => 'Costs',
            'id_worker' => 'Id Worker',
        ];
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::class, ['id' => 'id_worker']);
    }
}
