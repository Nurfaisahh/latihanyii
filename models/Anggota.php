<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property int $kode_anggota
 * @property string $nama
 * @property string $jk
 * @property string $jurusan
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_anggota', 'nama', 'jk', 'jurusan'], 'required'],
            [['kode_anggota'], 'integer'],
            [['nama', 'jk', 'jurusan'], 'string', 'max' => 20],
            [['kode_anggota'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_anggota' => 'Kode Anggota',
            'nama' => 'Nama',
            'jk' => 'Jenis Kelamin',
            'jurusan' => 'Jurusan',
        ];
    }
    public function getPeminjaman()
    {
        return $this->hasOne (Petugas::className(), ['kode_anggota'=>'kode_anggota']);
    }

    public function getPenegembalian()
    {
        return $this->hasOne (Petugas::className(), ['kode_anggota'=>'kode_anggota']);
    }
}
