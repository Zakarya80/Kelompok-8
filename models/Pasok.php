<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasok".
 *
 * @property int $id_pasok
 * @property int|null $harga
 * @property string|null $tanggal
 * @property int|null $jumlah
 *
 * @property Pemasok[] $pemasoks
 * @property Produk[] $produks
 * @property TransaksiPenjualan[] $transaksiPenjualans
 */
class Pasok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasok';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasok'], 'required'],
            [['id_pasok', 'harga', 'jumlah'], 'integer'],
            [['tanggal'], 'safe'],
            [['id_pasok'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasok' => 'Id Pasok',
            'harga' => 'Harga',
            'tanggal' => 'Tanggal',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * Gets query for [[Pemasoks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemasoks()
    {
        return $this->hasMany(Pemasok::className(), ['Pasok_id_pasok' => 'id_pasok']);
    }

    /**
     * Gets query for [[Produks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduks()
    {
        return $this->hasMany(Produk::className(), ['Pasok_id_pasok' => 'id_pasok']);
    }

    /**
     * Gets query for [[TransaksiPenjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPenjualans()
    {
        return $this->hasMany(TransaksiPenjualan::className(), ['Pasok_id_pasok' => 'id_pasok']);
    }
}
