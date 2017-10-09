<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Cart;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\SingleCart;
use App\User;
use App\Category;
use App\Bank;
class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();

        return view('user/product',compact('data'));
    }

    public function detail($category,$product){

        $getId = Product::where('permalink',$product)->first();
        $data = Product::find($getId->id);

        $cart = Cart::where('id_produk',$getId->id)
                ->where('id_user',Auth::user()->id)
                ->where('status',0)->count();
        $dataCart = Cart::where('id_produk',$getId->id)
                ->where('id_user',Auth::user()->id)
                ->where('status',0)->first();

        return view('user/detail',compact('data','cart','dataCart'));
    }

    public function category($category){

        $count = Category::where('nama_kategori',$category)->count();
        if ($count != 0) {
            $category = Category::where('nama_kategori',$category)->first();
            $id_kategori = $category->id;
            $data =  Product::where('id_kategori',$id_kategori)->get();
            $kategori = $category->nama_kategori;
            return view('user/category',compact('data','kategori'));
        }
        return redirect('/');

    }

    public function wrap_search(Request $request){
        $query = $request->q;
        return redirect('search/'.$query);
    }

    public function search($query){
         $query = str_replace('+', ' ', $query);
        $data = Product::where('nama_produk','LIKE',"%".$query."%")->get();
        $title = $query; 
        return view('user/search',compact('data','title'));

    }

    public function buy($product){

        if (Auth::check()) {
        $getId = Product::where('permalink',$product)->first();
        $data = Product::find($getId->id);

        return view('user/buy',compact('data'));
         }
         else{
            return redirect()->back()->with('info','Login Dulu');
         }
    }

    public function cart(Request $request){
        $data = Cart::where('id_user',Auth::user()->id)->where('status','0')->get();
        return view('user/cart',compact('data'));
    }

    public function addToCart(Request $request){

        if (Auth::check()) {
        $find = Cart::where('id_produk',$request->product)->where('id_user',Auth::user()->id)->where('status',0)->count();

        if ($find == 0) {
        $cart = new Cart;
        $cart->id_user = Auth::user()->id;
        $cart->id_produk = $request->product;
        $cart->status = 0;
        if ($cart->save()) {
            return redirect()->back()->with('info','sukses menambah ke keranjang');

        } 

    }
            else{
            return redirect()->back()->with('info','Gagal menambah ke keranjang');
        }
        }
        else{
            return redirect()->back()->with('info','Login Dulu');   
        }


}

    public function removeCart($id){

        $cart = Cart::where('id_transaksi_keranjang',$id);
        $cart->delete();
        return redirect()->back();
    }

    public function saveCart(Request $request){
        foreach ($request->qty as $key => $value) {


            $produk = Product::find($request->produk[$key]);
            $harga =  $produk->harga_produk;

            $cart = Cart::find($request->cart_id[$key]);
            $cart->jumlah_produk = $value;
            $cart->harga = $harga;
            $cart->subtotal = $value * $harga;
            $cart->save();

           
        }
         return redirect('cart-detail');
    }

    public function cart_detail(){
        $d = Cart::where('id_user',Auth::user()->id)->where('status','0')->get();
        $data = Cart::select(DB::raw("SUM(subtotal) as total"))->where('id_user',Auth::user()->id)->first();
        $total =$data->total;

        return view('user/cart-detail',compact('d','total'));
    }

    public function saveTransaction(Request $request){
        $d = Cart::where('id_user',Auth::user()->id)->where('status','0')->get();

        $str = '';
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $max = mb_strlen($string,'8bit') - 1;
        for ($i=0; $i < 12 ; ++$i) { 
            $str .= $string[random_int(0, $max)];
        }

        $number = '123456789';
        $length = 3;
        $charactersLength = strlen($number);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $number[rand(0, $charactersLength - 1)];
        }



        foreach ($d as $data) {

            $transaction = new Transaction;
            $code ='TRN'.strtoupper($str);
            $transaction->id_transaksi = $code;
            $transaction->nama_penerima = $request->nama;
            $transaction->alamat_penerima = $request->alamat;
            $transaction->id_user = Auth::user()->id;
            $transaction->jenis_transaksi = 2;
            $transaction->id_transaksi_keranjang = $data->id_transaksi_keranjang;
            $transaction->status_transaksi = 2;
            $subtotal = $data->subtotal;
            $transaction->kode_unik = $randomString;
            $transaction->total = $data->subtotal;
            $transaction->save();

            $update = Cart::find($data->id_transaksi_keranjang);
            $update->status = 1;
            $update->save();
        }


        return redirect('success/'.strtoupper($code));

 


    }

    public function success($code){
        $data = Transaction::where('id_transaksi',$code)->get();
        $total = Transaction::select(DB::raw("SUM(total) as total"))->where('id_transaksi',$code)->first()->total;
        $banks = Bank::all();
        $first = Transaction::where('id_transaksi',$code)->first();
        $kodeunik = $first->kode_unik;
        $keranjang = $first->id_transaksi_keranjang;


        return view('user/success',compact('data','total','kodeunik','keranjang','banks'));
    }

    public function buyTransaction(Request $request){
         $str = '';
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $max = mb_strlen($string,'8bit') - 1;
        for ($i=0; $i < 12 ; ++$i) { 
            $str .= $string[random_int(0, $max)];
        }

        $number = '123456789';
        $length = 3;
        $charactersLength = strlen($number);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $number[rand(0, $charactersLength - 1)];
        }

        $produk = Product::find($request->produk);
        $harga = $produk->harga_produk;

        $input = new SingleCart;
        $input->id_user= Auth::user()->id;
        $input->id_produk = $request->produk;
        $input->jumlah_produk = $request->stok;
        $input->harga = $harga;
        $input->status = 0;
        $input->subtotal = $request->stok * $harga;
        $input->save();

        $lastInput = SingleCart::where('id_user',Auth::user()->id)->where('id_produk',$request->produk)->orderBy('created_at', 'desc')->first();

            $transaction = new Transaction;
            $code = 'TRN'.strtoupper($str);
            $transaction->id_transaksi = $code;
            $transaction->nama_penerima = $request->nama;
            $transaction->alamat_penerima = $request->alamat;
            $transaction->jenis_transaksi = 2;
            $transaction->id_user = Auth::user()->id;
            $transaction->id_transaksi_satuan = $lastInput->id_transaksi_satuan;
            $transaction->status_transaksi = 1;
            $transaction->kode_unik = $randomString;
            $transaction->total = $lastInput->subtotal;
            $transaction->save();

        return redirect('success/'.strtoupper($code));


    }
public function profile(){
    return view('user/profile');
}

public function change_profile(Request $request){
    $profile = User::find(Auth::user()->id);
    $profile->nama_lengkap =  $request->nama;
    $profile->email         =    $request->email;
    $profile->no_hp          =  $request->no_hp;
    $profile->jk            = $request->jk;
    $profile->alamat       = $request->alamat;
    if ($request->foto != null) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('img'),$photoName);    
    $profile->foto = $photoName;
    }
    $profile->save();

    return redirect('profile');

}


public function list_transaction(){
    $transactions = Transaction::select(DB::raw('SUM(total) as total,id_transaksi,id_user,created_at,nama_penerima,status_transaksi'))->groupBy('id_transaksi')->where('id_user',Auth::user()->id)->get();


    return view('user/transactions',compact('transactions'));
}

public function detailTransaction($code){
        $count = Transaction::where('id_transaksi',$code)->count();
        if ($count != 0) {
        $data = Transaction::where('id_transaksi',$code)->get();
        $total = Transaction::select(DB::raw("SUM(total) as total"))->where('id_transaksi',$code)->first()->total;
        $first = Transaction::where('id_transaksi',$code)->first();
        $kodeunik = $first->kode_unik;
        $keranjang = $first->id_transaksi_keranjang;
        $total = Transaction::select(DB::raw("SUM(total) as total"))->where('id_transaksi',$code)->first()->total;

            return view('user/transaction',compact('data','keranjang','first','total'));
         } 
         return abort(404);

}
}
