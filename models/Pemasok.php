<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemasok".
 *
 * @property int $id_pemasok
 * @property string $nama
 * @property string $alamat
 * @property int $no_hp
 * @property int $Pasok_id_pasok
 *
 * @property Pasok $pasokIdPasok
 */
class Pemasok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemasok';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'no_hp', 'Pasok_id_pasok'], 'required'],
            [['no_hp', 'Pasok_id_pasok'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 45],
            [['Pasok_id_pasok'], 'exist', 'skipOnError' => true, 'targetClass' => Pasok::className(), 'targetAttribute' => ['Pasok_id_pasok' => 'id_pasok']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemasok' => 'Id Pemasok',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
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
}
