<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%t_pesanan}}`.
 */
class m230908_010457_create_t_pesanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%t_pesanan}}', [
            'id' => $this->primaryKey(),
            'no_pesanan' => $this->string(20),
            'tanggal' => $this->datetime(),
            'nm_supplier' => $this->string(50),
            'nm_produk' => $this->string(50),
            'total' => $this-> float()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%t_pesanan}}');
    }
}
