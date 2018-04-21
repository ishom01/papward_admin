<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bright".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property string $phone
 * @property int $type
 */
class Bright extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bright';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'address', 'lat', 'lng', 'phone', 'type'], 'required'],
            [['image', 'address'], 'string'],
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['lat', 'lng'], 'string', 'max' => 25],
            [['phone'], 'string', 'max' => 12],
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
            'phone' => 'Phone',
            'type' => 'Type',
        ];
    }
}
