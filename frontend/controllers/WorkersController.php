<?php

namespace frontend\controllers;

use app\models\Expenses;
use app\models\Incomes;
use app\models\Workers;
use app\models\WorkersCategories;
use frontend\models\WorkersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\IncomesSearch;
use frontend\controllers\sumIncomeController;
/**
 * WorkersController implements the CRUD actions for Workers model.
 */

class WorkersController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Workers models.
     *
     * @return string
     */

    public function actionIndex()
    {

        $data = WorkersCategories::find()->with(['incomes', 'expenses'])->all();
        $searchModel = new WorkersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $incomeSum = $this->incomeSum($data);
        $expensesSum = $this->expensesSum($data);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'incomeSum'=> $incomeSum,
            'expensesSum' => $expensesSum,
        ]);
    }

    /**
     * Displays a single Workers model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $workers = WorkersCategories::find()->where(['workerId' => $id])->with(['incomes', 'expenses'])->all();

        $sum_Expenses = 0;
        $sum_Income = 0;
        foreach ($workers as $worker):
            $incomes = $worker->incomes;
            $expenses = $worker->expenses;

            if (!empty($incomes)) {
                $sum_Income += $incomes['costs'];
                echo PHP_EOL;
            }
            if (!empty($expenses)) {
                $sum_Expenses += $expenses['costs'];
            }
        endforeach;

            $clear_Income = $sum_Income - $sum_Expenses;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'workers' => $workers,
            'sum_Income' => $sum_Income,
            'sum_Expenses' => $sum_Expenses,
            'clear_Income' => $clear_Income,

        ]);
    }

    /**
     * Creates a new Workers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Workers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Workers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Workers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Workers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Workers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Workers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function incomeSum($data)
    {

        $sum_Income = 0;

        foreach ($data as $datum){
            $incomes = $datum->incomes;
            if (!empty($incomes)) {
                $sum_Income += $incomes['costs'];
                echo PHP_EOL;
            }
            if (!empty($expenses)) {
                $sum_Expenses += $expenses['costs'];
            }
        }
            return $sum_Income;
    }

    public function expensesSum($data)
    {
        $sum_Expenses = 0;

        foreach ($data as $datum){
            $expenses = $datum->expenses;
            if (!empty($expenses)) {
                $sum_Expenses += $expenses['costs'];
            }
        }

        return $sum_Expenses;
    }
}
