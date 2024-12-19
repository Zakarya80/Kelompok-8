<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiPenjualan;

/**
 * TransaksiPenjualanSearch represents the model behind the search form of `app\models\TransaksiPenjualan`.
 */
class TransaksiPenjualanSearch extends TransaksiPenjualan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'harga', 'jumlah', 'Penjual_id_penjual', 'Pasok_id_pasok'], 'integer'],
            [['nama_pembeli', 'tanggal'], 'safe'],
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
        $query = TransaksiPenjualan::find();

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
            'id_transaksi' => $this->id_transaksi,
            'harga' => $this->harga,
            'tanggal' => $this->tanggal,
            'jumlah' => $this->jumlah,
            'Penjual_id_penjual' => $this->Penjual_id_penjual,
            'Pasok_id_pasok' => $this->Pasok_id_pasok,
        ]);

        $query->andFilterWhere(['like', 'nama_pembeli', $this->nama_pembeli]);

        return $dataProvider;
    }
}
