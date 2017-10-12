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
																<td>{{$diskon == 0 ? $total : $total .'-'. $diskon}}</td>
															</tr>
														</tbody>
													</table>
													<br>
													Total Yang Kamu Bayar,
													@if($diskon-$total == 0)
													<center>
														<h2>Gratis</h2>

													</center>
													@else
													<center>
													<h2>{{'Rp. '.number_format($total-$diskon,2,',','.')}}</h2>

													@if($countUserTransaction != null)
													@if($voucherCount->count() != null)
													@if($UserTransaction->total_transaksi == $voucher->banyak_transaksi)
													<br>

													Voucher Anda : <b>{{$UserTransaction->total_voucher}}</b>
													<br>
													<a href="{{@url('useVoucher/'.$code)}}">Pakai Voucher?</a>
													<br>
													@endif
													@endif
													@endif
													<br>
													
													</center>

												</div>
											</div>
										@endif

										<center>
											<h3>Lanjutkan Transaksi?</h3>
													<a href="{{@url('success/'.$code)}}">
													<button class="btn btn-green" style="margin: 5px;">IYA</button>
													</a>
													<a href="{{@url('cancel/'.$code)}}">
													<button class="btn btn-red" style="margin: 5px;">TIDAK</button>
</a>
										</center>
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
