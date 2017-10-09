<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'tb_transaksi_detail';



    public function cart(){
    	return $this->belongsTo('App\Cart','id_transaksi_keranjang');
    }
    
    public function single(){
    	return $this->belongsTo('App\SingleCart','id_transaksi_satuan');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }

}
