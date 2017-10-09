<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('tb_produk',function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_produk');
            $table->integer('stok_produk');
            $table->integer('harga_produk');
            $table->string('foto');
            $table->integer('id_kategori')->unsigned();
            $table->timestamps();

        });
        Schema::create('tb_kategori',function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_kategori');
            $table->timestamps();
        });

        Schema::create('tb_transaksi_detail',function(Blueprint $table){
            $table->increments('id_transaksi');
            $table->tinyInteger('jenis_transaksi');
            $table->integer('id_transaksi_satuan')->unsigned()->nullable();
            $table->integer('id_transaksi_keranjang')->unsigned()->nullable();
            $table->tinyInteger('status_transaksi');
            $table->integer('total');
            $table->timestamps();

        });
        Schema::create('tb_transaksi_satuan',function(Blueprint $table){
            $table->increments('id_transaksi_satuan');
            $table->integer('id_user')->unsigned();
            $table->integer('id_produk')->unsigned();
            $table->integer('jumlah_produk');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->timestamps();

        });
        Schema::create('tb_transaksi_keranjang',function(Blueprint $table){
            $table->increments('id_transaksi_keranjang');
            $table->integer('id_user')->unsigned();
            $table->integer('id_produk')->unsigned();
            $table->integer('jumlah_produk');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->timestamps();

        });
        Schema::create('tb_foto',function(Blueprint $table){
            $table->increments('id_foto');
            $table->string('foto');
            $table->timestamps();
        });


        Schema::create('tb_bank',function(Blueprint $table){
            $table->increments('id');
            $table->string('bank_name');
            $table->timestamps();
        });

        Schema::create('tb_pembayaran',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_bank')->unsigned();
            $table->integer('id_transaksi')->unsigned();
            $table->integer('kode_unik');
            // status pembayaran
            $table->tinyInteger('status');
            $table->timestamps();
        });

        // Schema::create('tb_nota',function(){
        //     $table->increments('id');

        // });

        Schema::table('tb_transaksi_detail',function(Blueprint $table){
            $table->foreign('id_transaksi_satuan')->references('id_transaksi_satuan')->on('tb_transaksi_satuan');
            $table->foreign('id_transaksi_keranjang')->references('id_transaksi_keranjang')->on('tb_transaksi_keranjang');
        });
        Schema::table('tb_transaksi_keranjang',function(Blueprint $table){
            $table->foreign('id_produk')->references('id')->on('tb_produk');
            $table->foreign('id_user')->references('id')->on('users');
        });
         Schema::table('tb_transaksi_satuan',function(Blueprint $table){
            $table->foreign('id_produk')->references('id')->on('tb_produk');
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('tb_produk',function(Blueprint $table){
            $table->foreign('id_kategori')->references('id')->on('tb_kategori');
        });

        Schema::table('tb_pembayaran',function(Blueprint $table){
            $table->foreign('id_bank')->references('id')->on('tb_bank');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('tb_transaksi_detail');
        });

        // Schema::table('users',function(Blueprint $table){
        //     $table->foreign('id_foto')->references('id_foto')->on('tb_foto');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
