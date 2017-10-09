<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    //
    protected $table="tb_voucher";
    public $timestamps = false;
    public $primaryKey = "id_voucher";
}
