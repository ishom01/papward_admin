<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spbu".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property int $toilet
 * @property int $musholla
 * @property int $restarea
 * @property int $tambal_ban
 * @property int $pomp_bensin
 * @property int $bright_store
 * @property int $service
 * @property int $bright_cafe
 */
class Spbu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spbu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'address', 'lat', 'lng', 'toilet', 'musholla', 'restarea', 'tambal_ban', 'pomp_bensin', 'bright_store', 'service', 'bright_cafe'], 'required'],
            [['image', 'address'], 'string'],
            [['toilet', 'musholla', 'restarea', 'tambal_ban', 'pomp_bensin', 'bright_store', 'service', 'bright_cafe'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['lat', 'lng'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'toilet' => 'Toilet',
            'musholla' => 'Musholla',
            'restarea' => 'Restarea',
            'tambal_ban' => 'Tambal Ban',
            'pomp_bensin' => 'Pomp Bensin',
            'bright_store' => 'Bright Store',
            'service' => 'Service',
            'bright_cafe' => 'Bright Cafe',
        ];
    }
}
