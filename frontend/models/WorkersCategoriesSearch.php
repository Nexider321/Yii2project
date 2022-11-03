<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkersCategories;

/**
 * WorkersCategoriesSearch represents the model behind the search form of `app\models\workers-categories`.
 */
class WorkersCategoriesSearch extends WorkersCategories
{
    public $workers;
    public $categories;
    public $incomes;
    public $expenses;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['categoryId', 'workerId', 'expenseId', 'incomeId', 'categories', 'workers', 'incomes', 'expenses'], 'safe'],
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
        $query = WorkersCategories::find();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        $this->load($params);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['workers', 'categories', 'expenses', 'incomes']);

        $dataProvider->sort->attributes['workers'] = [
            'asc' => ['workers.workerName' => SORT_ASC],
            'desc' => ['workers.workerName' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['incomes'] = [
            'asc' => ['incomes.type_income' => SORT_ASC],
            'desc' => ['incomes.type_income' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['expenses'] = [
            'asc' => ['expenses.type_expense' => SORT_ASC],
            'desc' => ['expenses.type_expense' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['categories'] = [
            'asc' => ['categories.categoryName' => SORT_ASC],
            'desc' => ['categories.categoryName' => SORT_DESC],
        ];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'categoryId', $this->categoryId])
            ->andFilterWhere(['like', 'workerId', $this->workerId])
            ->andFilterWhere(['like', 'expenseId', $this->expenseId])
            ->andFilterWhere(['like', 'incomeId', $this->incomeId])
        ->andFilterWhere(['like','workers.workerName', $this->workers])
        ->andFilterWhere(['like','categories.categoryName', $this->categories])
        ->andFilterWhere(['like','incomes.type_income', $this->incomes])
        ->andFilterWhere(['like','expenses.type_expense', $this->expenses]);


        return $dataProvider;
    }
}
