<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemasok;

/**
 * PemasokSearch represents the model behind the search form of `app\models\Pemasok`.
 */
class PemasokSearch extends Pemasok
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasok', 'no_hp', 'Pasok_id_pasok'], 'integer'],
            [['nama', 'alamat'], 'safe'],
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
        $query = Pemasok::find();

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
            'id_pemasok' => $this->id_pemasok,
            'no_hp' => $this->no_hp,
            'Pasok_id_pasok' => $this->Pasok_id_pasok,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
