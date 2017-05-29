<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reservation;

/**
 * ReservationSearch represents the model behind the search form about `common\models\Reservation`.
 */
class ReservationSearch extends Reservation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reserve_id', 'reserve_activity_type', 'reserve_att_num', 'reserve_layout', 'reserve_room', 'reserve_user', 'reserve_status'], 'integer'],
            [['reserve_topic', 'reserve_sdate', 'reserve_stime', 'reserve_edate', 'reserve_etime', 'reserve_comment', 'reserve_remark', 'reserve_pay_rate', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'safe'],
            [['reserve_pay_price'], 'number'],
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
        $query = Reservation::find();

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
            'reserve_id' => $this->reserve_id,
            'reserve_activity_type' => $this->reserve_activity_type,
            'reserve_att_num' => $this->reserve_att_num,
            'reserve_layout' => $this->reserve_layout,
            'reserve_sdate' => $this->reserve_sdate,
            'reserve_stime' => $this->reserve_stime,
            'reserve_edate' => $this->reserve_edate,
            'reserve_etime' => $this->reserve_etime,
            'reserve_room' => $this->reserve_room,
            'reserve_user' => $this->reserve_user,
            'reserve_status' => $this->reserve_status,
            'reserve_pay_price' => $this->reserve_pay_price,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'reserve_topic', $this->reserve_topic])
            ->andFilterWhere(['like', 'reserve_comment', $this->reserve_comment])
            ->andFilterWhere(['like', 'reserve_remark', $this->reserve_remark])
            ->andFilterWhere(['like', 'reserve_pay_rate', $this->reserve_pay_rate])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
