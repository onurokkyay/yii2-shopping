<?php

namespace onurokkyay\shopping\models;

use melih058\products\models\Products;
use sabsay03\user\models\User;
use Yii;

/**
 * This is the model class for table "shoppingcart".
 *
 * @property int $id
 * @property int|null $userid
 * @property int|null $productid
 *
 * @property Products $product
 * @property User $user
 */
class shoppingcart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoppingcart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'productid'], 'integer'],
            [['productid'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['productid' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'productid' => 'Productid',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'productid']);
    }

    /**
     * Gets query for [[user]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}
