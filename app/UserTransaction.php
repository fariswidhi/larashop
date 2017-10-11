<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    //
    protected $table = 'tb_user_transaction';
        public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

  
}
