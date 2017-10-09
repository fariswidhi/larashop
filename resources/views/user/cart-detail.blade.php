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
										<h1>Beli</h1>
										<form action="{{@route('save.transaction')}}" method="post">	
											{{@csrf_field()}}
											
										<label>Nama Penerima</label>
										<input type="text" name="nama" class="input" required value="{{Auth::user()->nama_lengkap}}">
											</div>
										<div style="margin: 5px;">
										<label>Alamat Penerima</label>
										<input type="text" name="alamat" class="input" required value="{{Auth::user()->alamat}}">
											</div>
											<div style="margin: 5px;">
													<button class="btn btn-blue">Beli</button>
											</div>
											</form>
										</div>
										<div class="xl-6">
										<h1>Total Tagihan</h1>
										<div style="margin: 5px">
											<table class="table table-striped">
											<tbody>
												<tr>
													<td>Jumlah</td><td><span id="total">{{$total}}</span></td>
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
							<div style="margin: 10px;">
								
							<h1>Detail </h1>

							<div class="row">
								@foreach($d as $data)
								<div class="xl-12">
									<div style="padding: 10px;">
																				
					<div class="xl-3">
						<img src="{{ @url('img/'. $data->produk->foto) }}" class="img-product">
					</div>
								<div class="xl-6">
						<div class="wrapper">
							<table class="table table-striped">
								<tbody>
								<tr>
									<td>Nama</td><td>{{ $data->produk->nama_produk }}</td>
								</tr>
	<tr>
									<td>Kategori</td><td>{{ $data->produk->categories->nama_kategori }}</td>
								</tr>
									<tr>
									<td>Harga</td><td>{{ $data->harga }}</td>
									</tr>

									<tr>
									<td>Jumlah</td><td>{{ $data->jumlah_produk }}</td>
									</tr>
									<tr>
									<td>Diskon</td><td>{{ $data->produk->id_diskon == 0 ? '0' : $data->produk->diskon->potongan."%" }}</td>
									</tr>
									<tr>
									<td>Subtotal</td><td>{{ $data->subtotal }}</td>
									</tr>

									<tr>
									<td>Deskripsi</td><td>{{ $data->produk->deskripsi }}</td>
									</tr>
									
									</tbody>
							</table>
						</div>
					</div>
									</div>
								</div>

					@endforeach
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
		width: 100%;
	}
</style>

@endsection
