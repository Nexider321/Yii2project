<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Incomes;

/**
 * IncomesSearch represents the model behind the search form of `app\models\Incomes`.
 */
class IncomesSearch extends Incomes
{
    /**
     * {@inheritdoc}
     */
    public $worker;

    public function rules()
    {
        return [
            [['id', 'costs', 'category_id'], 'integer'],
            [['type_income', 'workers'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Incomes::find();
        $query->joinWith(['workers']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['workers'] = [
            'asc' => ['workers.name' => SORT_ASC],
            'desc' => ['workers.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([

            'costs' => $this->costs,

        ]);

        $query->andFilterWhere(['like', 'type_income', $this->type_income]);
        $query->andFilterWhere(['like', 'workers.name', $this->worker]);

        return $dataProvider;
    }
}
