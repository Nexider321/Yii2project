<?php

namespace frontend\controllers;

use app\models\Categories;
use app\models\Expenses;
use app\models\WorkersCategories;
use frontend\models\WorkersCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Incomes;
use app\models\Workers;
/**
 * WorkersCategoriesController implements the CRUD actions for workers-categories model.
 */
class WorkersCategoriesController extends Controller
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
     * Lists all workers-categories models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkersCategoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $workers = Workers::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'workers' => $workers,
        ]);
    }

    /**
     * Displays a single workers-categories model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $workers = Workers::find()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'workers' => $workers,
        ]);
    }

    /**
     * Creates a new workers-categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionIncome()
    {
        
        $model = new WorkersCategories();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('income', [
            'model' => $model,
        ]);
    }

    public function actionExpense()
    {

        $model = new WorkersCategories();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('Expense', [
            'model' => $model,
        ]);
    }






    public function actionAjaxDropDownListByCategoryId($customer_id)
    {
        $output = '';
            $items = Incomes::findAll(['category_id' => $customer_id]);
    foreach ($items as $item):
                $output .= \yii\helpers\Html::tag('option', "$item->type_income $item->costs$", ['value' => $item->id]);
    endforeach;
        return $output;
    }
    public function actionAjaxDropDownListByCategorySellId($customer_id)
    {
        $output = '';
        $items = Expenses::findAll(['category_id' => $customer_id]);
        foreach ($items as $item):
            $output .= \yii\helpers\Html::tag('option', "$item->type_expense $item->costs$", ['value' => $item->id]);
        endforeach;
        return $output;
    }



    /**
     * Updates an existing workers-categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
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
     * Deletes an existing workers-categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the workers-categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return WorkersCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkersCategories::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
