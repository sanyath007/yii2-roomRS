<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Room;

/**
 * RoomSearch represents the model behind the search form about `common\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id'], 'integer'],
            [['room_name', 'room_capacity', 'room_locate', 'room_contact_name', 'room_contact_tel', 'room_pay_rate', 'room_reserv_max', 'room_img1', 'room_img2', 'room_img3', 'room_img4', 'room_img5', 'room_detail', 'room_status'], 'safe'],
            [['room_size'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Room::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'room_id' => $this->room_id,
            'room_size' => $this->room_size,
        ]);

        $query->andFilterWhere(['like', 'room_name', $this->room_name])
            ->andFilterWhere(['like', 'room_capacity', $this->room_capacity])
            ->andFilterWhere(['like', 'room_locate', $this->room_locate])
            ->andFilterWhere(['like', 'room_contact_name', $this->room_contact_name])
            ->andFilterWhere(['like', 'room_contact_tel', $this->room_contact_tel])
            ->andFilterWhere(['like', 'room_pay_rate', $this->room_pay_rate])
            ->andFilterWhere(['like', 'room_reserv_max', $this->room_reserv_max])
            ->andFilterWhere(['like', 'room_img1', $this->room_img1])
            ->andFilterWhere(['like', 'room_img2', $this->room_img2])
            ->andFilterWhere(['like', 'room_img3', $this->room_img3])
            ->andFilterWhere(['like', 'room_img4', $this->room_img4])
            ->andFilterWhere(['like', 'room_img5', $this->room_img5])
            ->andFilterWhere(['like', 'room_detail', $this->room_detail])
            ->andFilterWhere(['like', 'room_status', $this->room_status]);

        return $dataProvider;
    }
}
