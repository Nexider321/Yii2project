<?php

namespace frontend\controllers;

use app\models\Expenses;
use app\models\Incomes;
use app\models\Worker;
use frontend\models\WorkerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\IncomesSearch;
use frontend\controllers\sumIncomeController;
/**
 * WorkerController implements the CRUD actions for Worker model.
 */
class WorkerController extends Controller
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
     * Lists all Worker models.
     *
     * @return string
     */
    public function actionIndex()
    {



        $searchModel = new WorkerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $incomeSum = $this->incomeSum();
        $expensesSum = $this->expensesSum();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,



            'incomeSum'=> $incomeSum,
            'expensesSum' => $expensesSum,
        ]);
    }



    public function actionSum()
    {
        $searchModel = new IncomesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('sum', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Worker model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $incomes = Worker::find()->where(['id' => $id])->one()->getIncomes()->asArray()->all();
        $expenses = Worker::find()->where(['id' => $id])->one()->getExpenses()->asArray()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'incomes'=> $incomes,
            'expenses' => $expenses,
        ]);
    }

    /**
     * Creates a new Worker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Worker();

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
     * Updates an existing Worker model.
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
     * Deletes an existing Worker model.
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
     * Finds the Worker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Worker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Worker::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function incomeSum()
    {
        $sum = 0;
        $incomes = Incomes::find()->all();
        foreach($incomes as $item):
            $sum += $item['costs'];
        endforeach;
        return $sum;
    }
    public function expensesSum()
    {
        $sum = 0;
        $incomes = Expenses::find()->all();
        foreach($incomes as $item):
            $sum += $item['costs'];
        endforeach;
        return $sum;
    }
}
