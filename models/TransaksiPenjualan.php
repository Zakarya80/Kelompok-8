<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_penjualan".
 *
 * @property int $id_transaksi
 * @property string $nama_pembeli
 * @property int $harga
 * @property string $tanggal
 * @property int $jumlah
 * @property int $Penjual_id_penjual
 * @property int $Pasok_id_pasok
 *
 * @property Pasok $pasokIdPasok
 * @property Penjual $penjualIdPenjual
 */
class TransaksiPenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'nama_pembeli', 'harga', 'tanggal', 'jumlah', 'Penjual_id_penjual', 'Pasok_id_pasok'], 'required'],
            [['id_transaksi', 'harga', 'jumlah', 'Penjual_id_penjual', 'Pasok_id_pasok'], 'integer'],
            [['tanggal'], 'safe'],
            [['nama_pembeli'], 'string', 'max' => 45],
            [['id_transaksi'], 'unique'],
            [['Pasok_id_pasok'], 'exist', 'skipOnError' => true, 'targetClass' => Pasok::className(), 'targetAttribute' => ['Pasok_id_pasok' => 'id_pasok']],
            [['Penjual_id_penjual'], 'exist', 'skipOnError' => true, 'targetClass' => Penjual::className(), 'targetAttribute' => ['Penjual_id_penjual' => 'id_penjual']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'nama_pembeli' => 'Nama Pembeli',
            'harga' => 'Harga',
            'tanggal' => 'Tanggal',
            'jumlah' => 'Jumlah',
            'Penjual_id_penjual' => 'Penjual Id Penjual',
            'Pasok_id_pasok' => 'Pasok Id Pasok',
        ];
    }

    /**
     * Gets query for [[PasokIdPasok]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasokIdPasok()
    {
        return $this->hasOne(Pasok::className(), ['id_pasok' => 'Pasok_id_pasok']);
    }

    /**
     * Gets query for [[PenjualIdPenjual]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualIdPenjual()
    {
        return $this->hasOne(Penjual::className(), ['id_penjual' => 'Penjual_id_penjual']);
    }
}
