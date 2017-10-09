<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'tb_transaksi_keranjang';

    protected $primaryKey = 'id_transaksi_keranjang';

    public function produk(){
    	return $this->belongsTo('App\Product','id_produk');
    }
}
