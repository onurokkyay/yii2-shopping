<?php
use backend\modules\shopping\models\shoppingcart;
use backend\Modules\products\models\Products;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel onurokkyay\shoppingcart\models\ShoppingcartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sepetim';
function search()
{
    $query = Shoppingcart::find();

    // add conditions that should always apply here

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
    // grid filtering conditions
    $query->andFilterWhere([
        'userid' => yii::$app->user->id,
    ]);

    return $dataProvider;
}
$dataProvider=search();

?>

<div class="shoppingcart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    ListView::widget([


        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('view',['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
        'itemOptions' => [
            'tag' => false,
        ],
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],
    ]);
    ?>
    <?php
    $uid=Yii::$app->user->id;
    $sql = "select productid from shoppingcart where userid='$uid) . '";

    $result=Yii::$app->db
    ->createCommand($sql)
    ->queryColumn();
    ?>

    <?php if($result) : ?>
    <?= Html::a('Alışverişi Tamamla', ['purchase',], ['class' => 'btn btn-primary']) ?>
    <?php else :?>
    Sepette Ürün Yok.
    <?php endif;?>

</div>
