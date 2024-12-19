<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id_transaksi
 * @property string $nama_pembeli
 * @property int $harga
 * @property string $tanggal
 * @property int $jumlah
 * @property int $Penjual_id_penjual
 *
 * @property Pasok[] $pasoks
 * @property Penjual $penjualIdPenjual
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'nama_pembeli', 'harga', 'tanggal', 'jumlah', 'Penjual_id_penjual'], 'required'],
            [['id_transaksi', 'harga', 'jumlah', 'Penjual_id_penjual'], 'integer'],
            [['tanggal'], 'safe'],
            [['nama_pembeli'], 'string', 'max' => 45],
            [['id_transaksi'], 'unique'],
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
        ];
    }

    /**
     * Gets query for [[Pasoks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasoks()
    {
        return $this->hasMany(Pasok::className(), ['Transaksi Penjualan_id_transaksi' => 'id_transaksi']);
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
