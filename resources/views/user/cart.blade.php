@extends('user.index')

@section('content')

<div class="row">
	
		<div class="xl-6" style="margin: 0 auto;float: none;">
		<div class="wrap-panel">
			<div class="panel" style="box-sizing: border-box;">
					<h1>Daftar Keranjang</h1>
					@if(count($data) != 0)
			<form action="{{@route('save.cart')}}" method="post">
		{{ csrf_field() }}

				<table class="table table-striped" id="cart-table">
					<thead>
						<th>Produk</th>
						<th>Harga</th>
						<th>Diskon (%)</th>
						<th>Banyak</th>
						<th>Total</th>
					</thead>
					<tbody>
						@foreach($data as $d)
						<tr>
							<td><a href="{{@url('/'. $d->produk->permalink)}}">{{ $d->produk->nama_produk}}</a></td>
							<td class="cart-price-{{$d->id_transaksi_keranjang}}">{{ $d->produk->harga_produk}}</td>
							<input type="hidden" name="cart_id[]" value="{{$d->id_transaksi_keranjang}}">
							<input type="hidden" name="produk[]" value="{{$d->produk->id}}">
							<input type="hidden" name="discount[]" value="{{$d->produk->id_diskon == 0 ? '0' : $d->produk->diskon->potongan}}">

										@php 

										if($d->produk->id_diskon != 0){
											$diskons = explode(',',$d->produk->diskon->potongan);
											if(count($diskons) < 1){
											$array = [];
											$array[0] = $diskons[0];
											}
											else{
											$array = [];
											$array = $diskons;
											}
										}

										@endphp
										@if($d->produk->id_diskon != 0)
										<td><span class="diskon-{{$d->id_transaksi_keranjang}}" style="display: none;">{{$array[0]}}</span>
											<span  style="display: none;" class="diskon-2-{{$d->id_transaksi_keranjang}}">{{count($array) == 2 ? $array[1] : '0'}}</span>
											{{count($array) > 1 ? $array[0].'+'.$array[1] : $array[0]}}

										</td>
										@else
										<td><span class="diskon-{{$d->id_transaksi_keranjang}}" style="display: none;">0</span><span class="diskon-2-{{$d->id_transaksi_keranjang}}">0</span></td>
										@endif


							<td ><input class="input input-transaksi" data-stok="{{$d->produk->stok_produk}}" type="number" name="qty[]" data-id="{{$d->id_transaksi_keranjang}}" placeholder="Jumlah"></td>
							<td class="total-{{$d->id_transaksi_keranjang}}"></td>
							<td class="cart-total-{{$d->id_transaksi_keranjang}} cart-total">0</td>
							<td>
								<a href="{{@route('remove.cart',$d->id_transaksi_keranjang)}}">
								<button type="button" class="btn btn-red" name="produk" value="{{ $d->id_transaksi_keranjang }}">Hapus</button>
							</a>
							</td>
	</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				

				<button id="continue" type="submit" class="btn btn-blue">Lanjut</button>

			</form>
			@else

			<center>
				<h1 style="font-weight: normal;">Tidak Ada</h1>
			<h3 style="font-weight: normal;">Belanja dan Masukan Barang ke Keranjang</h3>
			</center>
			@endif
			</div>
			</div>
		</div>
</div>

<style type="text/css">
	.content{
		width: 100%;
	}
</style>
@endsection