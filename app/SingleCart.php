<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleCart extends Model
{
    //
    protected $primaryKey = 'id_transaksi_satuan';

    protected $table = 'tb_transaksi_satuan';

    public function produk(){
    	return $this->belongsTo('App\Product','id_produk');
    }
}
