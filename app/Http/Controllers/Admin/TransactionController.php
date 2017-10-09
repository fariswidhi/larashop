<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{

	public function index(){
		$title ="Daftar Transaksi";
		$data = Transaction::select(DB::raw('SUM(total) as total,id_transaksi,id_user,created_at,status_transaksi'))->groupBy('id_transaksi')->get();




		return view('admin/page/transaction/index',compact('title','data'));
	}

	public function change(Request $request){
		$tr = $request->transaction;

	 	Transaction::where('id_transaksi',$tr)->update(['status_transaksi'=>$request->status]);
	
		return redirect('/admin/transaction')->with('info','Sukses');
	}

	public function search(Request $request){
		$q = $request->q;

		$data = Transaction::where('id_transaksi','LIKE',$q)->groupBy('id_transaksi')->get();
		$title = $q;
		return view('admin/page/transaction/search',compact('data','title'));
	}



}