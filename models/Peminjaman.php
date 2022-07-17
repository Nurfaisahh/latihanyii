<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property string $kode_pinjam
 * @property string $tgl_pinjam
 * @property string $tgl_kembali
 * @property string $kode_petugas
 * @property string $kode_anggota
 * @property string $kode_buku
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pinjam', 'tgl_pinjam', 'tgl_kembali', 'kode_petugas', 'kode_anggota', 'kode_buku'], 'required'],
            [['tgl_pinjam', 'tgl_kembali'], 'safe'],
            [['kode_pinjam', 'kode_petugas', 'kode_anggota'], 'string', 'max' => 20],
            [['kode_buku'], 'string', 'max' => 11],
            [['kode_pinjam'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_pinjam' => 'Kode Pinjam',
            'tgl_pinjam' => 'Tanggal Pinjam',
            'tgl_kembali' => 'Tanggal Kembali',
            'kode_petugas' => 'Kode Petugas',
            'kode_anggota' => 'Kode Anggota',
            'kode_buku' => 'Kode Buku',
        ];
    }

    public function getPetugas()
    {
        return $this->hasOne (Petugas::className(), ['kode_petugas'=>'kode_petugas']);
    }

    public function getAnggota()
    {
        return $this->hasOne (Petugas::className(), ['kode_anggota'=>'kode_anggota']);
    }

    public function getPengembalian()
    {
        return $this->hasOne (Petugas::className(), ['kode_buku'=>'kode_buku']);
    }

    public function getBuku()
    {
        return $this->hasOne (Petugas::className(), ['kode_buku'=>'kode_buku']);
    }
}
