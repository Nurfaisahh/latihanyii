<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $kode_buku
 * @property string $judul
 * @property string $penulis
 * @property string $penerbit
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_buku', 'judul', 'penulis', 'penerbit'], 'required'],
            [['kode_buku'], 'integer'],
            [['judul', 'penulis', 'penerbit'], 'string', 'max' => 20],
            [['kode_buku'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_buku' => 'Kode Buku',
            'judul' => 'Judul',
            'penulis' => 'Penulis',
            'penerbit' => 'Penerbit',
        ];
    }
    
    public function getPeminjaman()
    {
        return $this->hasOne (Petugas::className(), ['kode_buku'=>'kode_buku']);
    }

    public function getPengembalian()
    {
        return $this->hasOne (Petugas::className(), ['kode_buku'=>'kode_buku']);
    }



    
}
