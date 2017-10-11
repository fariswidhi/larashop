@extends('user.index')

@section('content')

<div class="row">

			<div class="xl-12 l-3 s-12 m-3 ">
				<div class="wrap-card">
						<div class="card" style="width: 100%;">
							<div class="row">
								<div class="xl-12">
									<div style="padding: 10px;margin: 5px;">

										<div class="xl-6">
											<div style="margin: 5px;">
										<h1>Beli </h1>
										<form action="{{@route('buy.transaction')}}" method="post" id="form-buy"> 	
											{{@csrf_field()}}
											
										<label>Nama Penerima</label>
										<input type="text" name="nama" class="input" required value="{{Auth::user()->nama_lengkap}}">
											</div>
										<div style="margin: 5px;">
										<label>Alamat Penerima</label>
										<input type="text" name="alamat" class="input" required value="{{Auth::user()->alamat}}">
										<input type="hidden" name="produk" value="{{$data->id}}">
										<input type="hidden" name="stok" value="" id="banyak-produk">
										<input type="hidden" name="diskon" id="diskon">

											</div>
											<div style="margin: 5px;">
													<button class="btn btn-blue" type="button" id="btn-buy">Beli</button>
											</div>
											</form>
										</div>
										<div class="xl-6">
										<h1>Total Tagihan</h1>
										<div style="margin: 5px">
											<table class="table table-striped">
											<tbody>


												<tr>
													<td>Jumlah</td><td><span id="total"></span></td>
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
			</div>	
			<div class="xl-12 l-3 s-12 m-3 ">
				<div class="wrap-card">
						<div class="card" style="width: 100%;">
							<div class="row">
								<div class="xl-12">
									<div style="padding: 10px;">
										<h1>Detail </h1>
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
									<td>Stok</td><td><span class="stock">{{ $data->stok_produk }}</span></td>
									</tr>
									<tr>
									<td>Stok</td><td><span class="price">{{ $data->harga_produk }}</span></td>
									</tr>
									<tr>
										@php 
										if($data->id_diskon != 0){
											$diskons = explode(',',$data->diskon->potongan);
											
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
										@if($data->id_diskon != 0)
										<td>Diskon</td><td><span class="diskon" style="display: none;">{{$array[0]}}</span><span  style="display: none;" class="diskon-2">{{count($array) == 2 ? $array[1] : '0'}}</span>{{count($array) > 1 ? $array[0].'+'.$array[1] : $array[0]}}</td>
										@else
										<td>Diskon</td><td><span class="diskon" style="display: none;">0</span><span class="diskon-2">0</span></td>
										@endif

									</tr>
									<tr>
									<td>Deskripsi</td><td>{{ $data->deskripsi }}</td>
									</tr>
									<tr>
										<td>Jumlah</td><td><input required type="number" id="qty" name="" class="input"></td>
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
			</div>	

</div>

<style type="text/css">
	.wrap-card{
		height: auto;
	}
	.content{
		width: 85%;
	}
</style>

@endsection
