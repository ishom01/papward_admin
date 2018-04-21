<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RewardItem;

/**
 * RewardItemSearch represents the model behind the search form of `app\models\RewardItem`.
 */
class RewardItemSearch extends RewardItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reward_cat', 'point'], 'integer'],
            [['name', 'image', 'date', 'overview', 'how_to_use', 'term_and_condition'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RewardItem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'reward_cat' => $this->reward_cat,
            'date' => $this->date,
            'point' => $this->point,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'how_to_use', $this->how_to_use])
            ->andFilterWhere(['like', 'term_and_condition', $this->term_and_condition]);

        return $dataProvider;
    }
}
