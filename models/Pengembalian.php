<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengembalian".
 *
 * @property string $kode_kembali
 * @property string $tanggal_kembali
 * @property string $kode_petugas
 * @property string $kode_anggota
 * @property string $kode_buku
 */
class Pengembalian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengembalian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_kembali', 'tanggal_kembali', 'kode_petugas', 'kode_anggota', 'kode_buku'], 'required'],
            [['tanggal_kembali'], 'safe'],
            [['kode_kembali', 'kode_petugas', 'kode_anggota', 'kode_buku'], 'string', 'max' => 20],
            [['kode_kembali'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_kembali' => 'Kode Kembali',
            'tanggal_kembali' => 'Tanggal Kembali',
            'kode_petugas' => 'Kode Petugas',
            'kode_anggota' => 'Kode Anggota',
            'kode_buku' => 'Kode Buku',
        ];
    }

    public function getAnggota()
    {
        return $this->hasOne (Petugas::className(), ['kode_anggota'=>'kode_anggota']);
    }

    public function getBuku()
    {
        return $this->hasOne (Petugas::className(), ['kode_buku'=>'kode_buku']);
    }
}
