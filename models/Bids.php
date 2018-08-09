<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bids".
 *
 * @property int $id
 * @property int $id_event
 * @property string $name
 * @property string $email
 * @property double $price
 *
 * @property Events $event
 */
class Bids extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_event'], 'integer'],
	        [['email'], 'email'],
            [['price'], 'match', 'pattern' => '/(\d*\.\d{2}\b)/'],
	        [['price'], 'default', 'value' => 0],
	        [['id_event', 'name', 'email'], 'required'],
            [['id_event', 'name', 'email'], 'string', 'max' => 255],
            [['id_event'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['id_event' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_event' => 'Id Event',
            'name' => 'Name',
            'email' => 'Email',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Events::className(), ['id' => 'id_event']);
    }

    public function getAllBids()
    {
    	return $this->find()->asArray()->all();
    }

    public function getBidMaxPriceUserName()
    {
	    $max_price = $this->find()->max('price');
	    return $this->findOne(['price' => $max_price])->name;
    }

    public function getUserNameMaxBidPrice()
    {
		return  $user_name = $this->find()->select('name');
	    return $this->findOne(['name' => $max_price])->name;
    }


}
