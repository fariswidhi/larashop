<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'tb_produk';

    public function categories(){
    	return $this->belongsTo('App\Category','id_kategori');
    }
}
