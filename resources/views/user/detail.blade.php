@extends('user.index')

@section('content')
<div class="row">
	<div class="xl-9">
		<div class="wrap-panel">
			<div class="panel">
		<h3 style="margin: 0;padding: 5px;">{{ $data->nama_produk }}
		@if($data->id_diskon != 0)
			({{'Diskon '.str_replace(',','+',$data->diskon->potongan).'%'}})
		@endif
		</h3>


		@if(session('info'))
		{{session('info')}}
		@endif
			<div class="row">
					<div class="xl-3">


						<img src="{{ @url('img/'.$data->foto) }}" class="img-product">
					</div>
					<div class="xl-6">
						<div class="wrapper">
							<table class="table table-striped">
								<tbody>
								<tr>
									<td>Nama</td><td>{{ $data->nama_produk }}</td>
								</tr>
								<tr>
									<td>Kategori</td><td>{{ $data->categories->nama_kategori }}</td>
								</tr>
									<tr>
									<td>Stok</td><td>{{ $data->stok_produk }}</td>
									</tr>

									<tr>
									<td>Deskripsi</td><td>{{ $data->deskripsi }}</td>
									</tr>
									</tbody>
							</table>
						</div>
					</div>
					<div class="xl-3">
						<div class="wrapper">
							@if(Auth::check())
							@if($cart == 0):
	      					<form action="{{route('add.cart')}}" method="post">
							{{csrf_field()}}
							<button class="btn btn-blue btn-cart" name="product" value="{{$data->id}}">Tambahkan Ke Keranjang</button>
							</form>
							@else

							<a href="{{@url('removeCart/'.$dataCart->id_transaksi_keranjang)}}">
							<button class="btn btn-red btn-cart" >Hapus dari Keranjang</button>
							</a>
							@endif
							@endif
								      					<form action="{{route('add.cart')}}" method="post">
							{{csrf_field()}}
							<button class="btn btn-blue btn-cart" name="product" value="{{$data->id}}">Tambahkan Ke Keranjang</button>
							</form>
							<a href="{{@url('buy/'.$data->permalink)}}">
							<button class="btn btn-blue btn-buyying">Beli</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="xl-3">
		<div class="wrap-panel">
			<div class="panel">
				<h3>Produk Terkait</h3>
				<ul class="product-related">
					<li>
						<img src="bunga.jpg">
						<a href="#">a</a>
						<span>Rp.10000</span>
					</li>
				</ul>
			</div>
		</div>
	</div>

</div>
@endsection