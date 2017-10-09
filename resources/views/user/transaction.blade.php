@extends('user.index')

@section('content')

<div class="row">
	<div class="xl-12">
		<div class="wrap-panel">
			<div class="panel">
				<div style="padding: 5px;">
					<h3>Detail Transaksi</h3>
					<div class="row">
						
					<div class="xl-6">
						<table class="table-striped">
							<tbody>
								<tr>
									<td>Nama Penerima</td><td>{{$first->nama_penerima}}</td>
								</tr>
								<tr>
									<td>Alamat Penerima</td><td>{{$first->alamat_penerima}}</td>
								</tr>
								<tr>
									<td>user</td> <td>{{$first->user->username}}</td>
								</tr>

								<tr>
									<td>Total</td><td>{{$total}}</td>
								</tr>
								<tr>
									<td>Status transaksi</td><td>{{ $first->status_transaksi == 1 ? 'Dikirim' : $first->status_transaksi == 0 ? 'Menunggu Pembayaran' : 'Ditolak'}}</td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<h3 style="padding: 5px;">Detail Belanjaan</h3>
<div class="row">

		@if($keranjang == null)
	@foreach ($data as $d)
		<div class="xl-6" >
		<div class="wrap-panel">
			<div class="panel">
						<div class="row">
					<div class="xl-3">


						<img src="{{ @url('img/'.$d->single->produk->foto) }}" class="img-product">
					</div>
					<div class="xl-9">
						<div class="wrapper">
							<table class="table table-striped">



								<tbody>
								<tr>
									<td>Nama</td><td>{{$d->single->produk->nama_produk}}</td>
								</tr>
								<tr>
									<td>Kategori</td><td>{{$d->single->produk->nama_produk}}</td>
								</tr>
									<tr>
									<td>Jumlah</td><td>{{$d->single->jumlah_produk}}</td>
									</tr>
									<tr>
									<td>Harga</td><td>{{$d->single->harga}}</td>
									</tr>
									<tr>
									<td>Jumlah</td><td>{{$d->single->subtotal}}</td>
									</tr>
									<tr>
									<td>Deskripsi</td><td>{{$d->single->produk->deskripsi}}</td>
									</tr>
									</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		</div>
		@endforeach
		@else

		@foreach ($data as $d)
		<div class="xl-6" >
		<div class="wrap-panel">
			<div class="panel">
						<div class="row">
					<div class="xl-3">


						<img src="{{ @url('img/'.$d->cart->produk->foto) }}" class="img-product">
					</div>
					<div class="xl-9">
						<div class="wrapper">
							<table class="table table-striped">



								<tbody>
								<tr>
									<td>Nama</td><td>{{$d->cart->produk->nama_produk}}</td>
								</tr>
								<tr>
									<td>Kategori</td><td>{{$d->cart->produk->nama_produk}}</td>
								</tr>
									<tr>
									<td>Jumlah</td><td>{{$d->cart->jumlah_produk}}</td>
									</tr>
									<tr>
									<td>Harga</td><td>{{$d->cart->harga}}</td>
									</tr>
									<tr>
									<td>Jumlah</td><td>{{$d->cart->subtotal}}</td>
									</tr>
									<tr>
									<td>Deskripsi</td><td>{{$d->cart->produk->deskripsi}}</td>
									</tr>
									</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		</div>
		@endforeach

@endif

</div>

<style type="text/css">
	.content{
		width: 100%;
	}
</style>
@endsection