<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property string|null $nama_produk
 * @property int|null $stok
 * @property string|null $deskripsi_produk
 * @property int $Pasok_id_pasok
 *
 * @property Kategori[] $kategoris
 * @property Pasok $pasokIdPasok
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stok', 'Pasok_id_pasok'], 'integer'],
            [['Pasok_id_pasok'], 'required'],
            [['nama_produk', 'deskripsi_produk'], 'string', 'max' => 45],
            [['Pasok_id_pasok'], 'exist', 'skipOnError' => true, 'targetClass' => Pasok::className(), 'targetAttribute' => ['Pasok_id_pasok' => 'id_pasok']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'nama_produk' => 'Nama Produk',
            'stok' => 'Stok',
            'deskripsi_produk' => 'Deskripsi Produk',
            'Pasok_id_pasok' => 'Pasok Id Pasok',
        ];
    }

    /**
     * Gets query for [[Kategoris]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategoris()
    {
        return $this->hasMany(Kategori::className(), ['Produk_id_produk' => 'id_produk']);
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
}
