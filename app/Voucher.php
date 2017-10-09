<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $table="tb_voucher";
    public $timestamps = false;
    public $primaryKey = "id_voucher";
}
