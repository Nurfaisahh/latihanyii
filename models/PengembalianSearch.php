<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengembalian;

/**
 * PengembalianSearch represents the model behind the search form of `app\models\Pengembalian`.
 */
class PengembalianSearch extends Pengembalian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_kembali', 'tanggal_kembali', 'kode_petugas', 'kode_anggota', 'kode_buku'], 'safe'],
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
        $query = Pengembalian::find();

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
            'tanggal_kembali' => $this->tanggal_kembali,
        ]);

        $query->andFilterWhere(['like', 'kode_kembali', $this->kode_kembali])
            ->andFilterWhere(['like', 'kode_petugas', $this->kode_petugas])
            ->andFilterWhere(['like', 'kode_anggota', $this->kode_anggota])
            ->andFilterWhere(['like', 'kode_buku', $this->kode_buku]);

        return $dataProvider;
    }
}
