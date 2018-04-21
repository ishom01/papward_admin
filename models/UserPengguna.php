<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_pengguna".
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property string $image
 * @property int $point
 * @property int $pin
 * @property int $ver_code
 * @property int $status
 */
class UserPengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'image', 'point', 'pin', 'ver_code', 'status'], 'required'],
            [['image'], 'string'],
            [['point','ver_code', 'status'], 'integer'],
            [['username'], 'string', 'max' => 100],
            [['pin'], 'string', 'max' => 6],
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
            'username' => 'Username',
            'phone' => 'Phone',
            'image' => 'Image',
            'point' => 'Point',
            'pin' => 'Pin',
            'ver_code' => 'Ver Code',
            'status' => 'Status',
        ];
    }
}
