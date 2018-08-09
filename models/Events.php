<?php

namespace app\models;

use Yii;

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
}
