<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reward_item".
 *
 * @property int $id
 * @property int $reward_cat
 * @property string $name
 * @property string $image
 * @property string $date
 * @property string $overview
 * @property string $how_to_use
 * @property string $term_and_condition
 * @property int $point
 */
class RewardItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reward_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reward_cat', 'name', 'image', 'date', 'overview', 'how_to_use', 'term_and_condition', 'point'], 'required'],
            [['reward_cat', 'point'], 'integer'],
            [['image', 'overview', 'how_to_use', 'term_and_condition'], 'string'],
            [['date'], 'safe'],
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
            'reward_cat' => 'Reward Cat',
            'name' => 'Name',
            'image' => 'Image',
            'date' => 'Date',
            'overview' => 'Overview',
            'how_to_use' => 'How To Use',
            'term_and_condition' => 'Term And Condition',
            'point' => 'Point',
        ];
    }
}
