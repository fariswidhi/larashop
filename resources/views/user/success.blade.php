@extends('user.index')

@section('content')

<div class="row">

			<div class="xl-12 l-3 s-12 m-3 ">
				<div class="wrap-card">
						<div class="card" style="width: 100%;">
							<div class="row">
								<div class="xl-12">
									<div style="padding: 10px;margin: 5px;">

										
										<div class="xl-6" style="float: none;margin: 0 auto;">
										<div style="margin: 5px">
											<center>
												<h1 style="padding: 0; margin: 0;">Terima Kasih...</h1>
												<br>

											</center>
											<div class="row">
												<div class="xl-12" style="margin: 5px;">
													<h1>Detail Belanjaan</h1>
												<table class="table table-striped">
													<thead>
														<th>Produk</th>
														<th>Harga</th>
														<th>Diskon</th>
														<th>Jumlah</th>
														<th>Subtotal</th>
													</thead>
														<tbody>
															@if($keranjang == null)
															@foreach($data as $d)
															<tr>
																<td>{{$d->single->produk->nama_produk}}</td>
																<td>{{$d->single->harga}}</td>
																<td>{{$d->single->diskon}}</td>
																<td>{{$d->single->jumlah_produk}}</td>
																<td>{{$d->single->subtotal}}</td>
															</tr>
															@endforeach
															@else
															@foreach($data as $d)
															<tr>
																<td>{{$d->cart->produk->nama_produk}}</td>
																<td>{{$d->cart->harga}}</td>
																<td>{{$d->cart->diskon}}</td>
																<td>{{$d->cart->jumlah_produk}}</td>
																<td>{{$d->cart->subtotal}}</td>
															</tr>
															@endforeach

															@endif
															<tr>
																<td colspan="4"><b>Total</b></td>
																<td>{{$total}}</td>
															</tr>
														</tbody>
													</table>
													<br>
													Total Yang Kamu Bayar,
													<center>
													<h2>{{'Rp. '.number_format($total+$kodeunik,2,',','.')}}</h2>
													<br>
													Untuk mempercepat verifikasi, bayarkan sesuai nominal diatas.

													</center>

												</div>
											</div>
											<center>Anda Dapat Membayarkannya Melalui Bank dibawah ini </center>
											<br>
											<div class="row">
												@foreach($banks as $bank)
												<div class="xl-4">
													<h3 style="padding: 0;margin: 0;">{{$bank->bank_name}}</h3> <br>									{{$bank->rekening}}
												</div>
												@endforeach
											</div>
										</div>
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
		width: 100%;
	}
</style>

@endsection
