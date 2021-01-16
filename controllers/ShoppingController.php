<?php

namespace onurokkyay\shopping\controllers;

use melih058\products\models\ProductsSearch;
use Yii;
use onurokkyay\shopping\models\shoppingcart;
use onurokkyay\shopping\models\ShoppingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShoppingController implements the CRUD actions for shoppingcart model.
 */
class ShoppingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all shoppingcart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShoppingSearch();
        $dataProvider =$searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPurchase()
    {

        $uid=Yii::$app->user->id;
        $sql = "select productid from shoppingcart where userid='$uid) . '";

        $result=Yii::$app->db
            ->createCommand($sql)
            ->queryColumn();

        foreach ($result as $row) {

            $sql1 = "insert into purchasehistory (userid,productid) values ( '$uid) . ','$row) . ')";

            $result=Yii::$app->db
                ->createCommand($sql1)
                ->execute();



        }

        $sql2 = "delete from shoppingcart where userid='$uid) . '";

        $result=Yii::$app->db
            ->createCommand($sql2)
            ->execute();

        echo '<script language="javascript">';
        echo 'if (confirm("Alışveriş tamamlandı.Anasayfaya gitmek için herhangi bir butona basın")) {
        window.location.replace("http://advanced/backend/web/index.php?r=products/products/index");
} else {
        window.location.replace("http://advanced/backend/web/index.php?r=products/products/index");
}
';
        echo '</script>';



    }

    /**
     * Displays a single shoppingcart model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new shoppingcart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new shoppingcart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing shoppingcart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing shoppingcart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the shoppingcart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return shoppingcart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = shoppingcart::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
