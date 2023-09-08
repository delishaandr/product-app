<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_pesanan".
 *
 * @property int $id
 * @property string|null $no_pesanan
 * @property string|null $tanggal
 * @property string|null $nm_supplier
 * @property string|null $nm_produk
 * @property float|null $total
 */
class TPesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['total'], 'number'],
            [['no_pesanan'], 'string', 'max' => 20],
            [['nm_supplier', 'nm_produk'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_pesanan' => 'No Pesanan',
            'tanggal' => 'Tanggal',
            'nm_supplier' => 'Nama Supplier',
            'nm_produk' => 'Nama Produk',
            'total' => 'Total',
        ];
    }
}
