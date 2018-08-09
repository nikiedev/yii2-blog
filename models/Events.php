<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $caption
 *
 * @property Bids[] $bids
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['caption'], 'string', 'max' => 255],
	        [['caption'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caption' => 'Caption',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBids()
    {
        return $this->hasMany(Bids::className(), ['id_event' => 'id']);
    }

    public function getAllEvents()
    {
    	return $this->find()->asArray()->all();
    }

	/**
	 * @param int $more_than
	 *
	 * @return array
	 * @throws \yii\db\Exception
	 */
	public function getEventMoreThanNum($more_than = 3)
	{
		$query = (new Query())
			->select(['events.caption', 'COUNT(bids.id_event) AS ev_bids_count'])
			->from('bids')
			->leftJoin( 'events', 'bids.id_event = events.id')
			->groupBy('events.caption')
			->having(['>', 'ev_bids_count', $more_than]);
		$command = $query->createCommand();
		return $command->queryAll();
	}
}
