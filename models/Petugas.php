<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "petugas".
 *
 * @property int $kode_petugas
 * @property string $nama
 * @property string $jk
 * @property string $jabatan
 */
class Petugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_petugas', 'nama', 'jk', 'jabatan'], 'required'],
            [['kode_petugas'], 'integer'],
            [['nama', 'jk', 'jabatan'], 'string', 'max' => 20],
            [['kode_petugas'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_petugas' => 'Kode Petugas',
            'nama' => 'Nama Petugas',
            'jk' => 'Jenis Kelamin',
            'jabatan' => 'Jabatan',
        ];
    }

    public function getPengembalian()
    {
        return $this->hasOne (Petugas::className(), ['kode_petugas'=>'kode_petugas']);
    }

    public function getPeminjaman()
    {
        return $this->hasOne (Petugas::className(), ['kode_petugas'=>'kode_petugas']);
    }
}
