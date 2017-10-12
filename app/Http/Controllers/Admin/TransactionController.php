<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Transaction;
use App\Cart;
use App\SingleCart;
use App\Product;
use App\Voucher;
use Illuminate\Support\Facades\DB;
use App\UserTransaction;

class TransactionController extends Controller
{

	  public function __construct()
    {
        $this->middleware('isAdmin');
    }
    
	public function index(){
		$title ="Daftar Transaksi";
		$data = Transaction::select(DB::raw('SUM(total) as total,id_transaksi,id_user,created_at,status_transaksi'))->groupBy('id_transaksi')->orderBy('created_at','desc')->get();

		return view('admin/page/transaction/index',compact('title','data'));
	}


	public function change(Request $request){
		$tr = $request->transaction;

		if ($request->status==2) {
	
		$transactions = Transaction::where('id_transaksi',$tr)->get();
		foreach ($transactions as $data) {
			
			Transaction::where('id_transaksi',$tr)->update(['status_transaksi'=>$request->status]);		
			if ($data->id_transaksi_satuan ==null) {
				$productStock = $data->cart->produk->stok_produk;
				$idProduct = $data->cart->id_produk;
				$qtyOnCart = $data->cart->jumlah_produk;

				$product = Product::find($idProduct);
				$product->stok_produk = $productStock + $qtyOnCart;
				$product->save();


			}
			else{
				$productStock = $data->single->produk->stok_produk;
				$idProduct = $data->single->id_produk;
				$qtyOnCart = $data->single->jumlah_produk;


				$product = Product::find($idProduct);
				$product->stok_produk = $productStock + $qtyOnCart;
				$product->save();

			}

		}
		}
			else{
				if ($request->status==1) {
					$userId = Transaction::where('id_transaksi',$tr)->first()->id_user;

					$voucherActive = Voucher::where('aktif',1)->count();

					$voucher = Voucher::where('aktif',1)->first();

					$datatotal = Transaction::select(DB::raw('SUM(total) as total'))->where('id_transaksi',$tr)->groupBy('id_transaksi')->first();

					if ($voucherActive > 0) {
							$maxTransaction = Voucher::where('aktif',1)->first()->banyak_transaksi;
					
					$user = UserTransaction::where('id_user',$userId);
					if ($user->count() == 0) {
					$UserTransaction = new UserTransaction;
					$UserTransaction->id_user = $userId;
					$UserTransaction->total_voucher = ($voucher->persen/100) * $datatotal->total;
					$UserTransaction->total_transaksi = 1;
					$UserTransaction->save();
					}

				else{
					print_r($user->first()->total_belanja);
				
				if ($user->first()->total_transaksi >= $maxTransaction) {
					$null = 0;

					UserTransaction::where('id_user',$userId)->update(['total_transaksi'=>$null]);		
				}
				else{


				UserTransaction::where('id_user',$userId)->update(['total_voucher'=>$user->first()->total_voucher+(($voucher->persen/100) * $datatotal->total),'total_transaksi'=>$user->first()->total_transaksi+1]);		
				}
				}
				
				Transaction::where('id_transaksi',$tr)->update(['status_transaksi'=>$request->status]);		

			}
			else{
			Transaction::where('id_transaksi',$tr)->update(['status_transaksi'=>$request->status]);
			}
		}
		else{
			Transaction::where('id_transaksi',$tr)->update(['status_transaksi'=>$request->status]);		
		}

	}




		// if ($request->status==1) {
		// 	# code...
		// }
		// elseif ($request->status==2) {
		// 	# code...
		// }


	 	Transaction::where('id_transaksi',$tr)->update(['status_transaksi'=>$request->status]);
	
		return redirect('/admin/transactions')->with('info','Sukses');
}

	public function search(Request $request){
		$q = $request->q;

		$data = Transaction::where('id_transaksi','LIKE',$q)->groupBy('id_transaksi')->get();
		$title = $q;
		return view('admin/page/transaction/search',compact('data','title'));
	}



}