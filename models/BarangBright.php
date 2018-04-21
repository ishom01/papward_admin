<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_bright".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $bright_id
 * @property int $harga
 * @property int $stock
 */
class BarangBright extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang_bright';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'bright_id', 'harga', 'stock'], 'required'],
            [['image'], 'string'],
            [['bright_id', 'harga', 'stock'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'bright_id' => 'Bright ID',
            'harga' => 'Harga',
            'stock' => 'Stock',
        ];
    }
}
