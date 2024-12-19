<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property int $idKategori
 * @property string|null $jenis
 * @property int $Produk_id_produk
 *
 * @property Produk $produkIdProduk
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Produk_id_produk'], 'required'],
            [['Produk_id_produk'], 'integer'],
            [['jenis'], 'string', 'max' => 45],
            [['Produk_id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['Produk_id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idKategori' => 'Id Kategori',
            'jenis' => 'Jenis',
            'Produk_id_produk' => 'Produk Id Produk',
        ];
    }

    /**
     * Gets query for [[ProdukIdProduk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdukIdProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'Produk_id_produk']);
    }
}
