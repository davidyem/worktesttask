<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property int $time
 * @property string $key
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'integer'],
            [['key'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'key' => 'Key',
        ];
    }
}
