<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjual".
 *
 * @property int $id_penjual
 * @property string|null $nama
 * @property string|null $alamat
 * @property int|null $no_hp
 *
 * @property TransaksiPenjualan[] $transaksiPenjualans
 */
class Penjual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penjual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjual'], 'required'],
            [['id_penjual', 'no_hp'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 45],
            [['id_penjual'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penjual' => 'Id Penjual',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
        ];
    }

    /**
     * Gets query for [[TransaksiPenjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPenjualans()
    {
        return $this->hasMany(TransaksiPenjualan::className(), ['Penjual_id_penjual' => 'id_penjual']);
    }
}
