@extends('user.index')

@section('content')

<div class="row">

	@foreach($data as $d)
			<div class="xl-2 l-3 s-12 m-3 panel-product">
				<div class="wrap-card">
						<div class="card">
							<span class="product-category">{{$d->categories->nama_kategori}}</span>
							<span style="float: right;color: #fff;clear: both;background: red;position: absolute;right: 0px;">{{$d->id_diskon ==0 ? '':$d->diskon->potongan.'%'}}</span>

				
							<img src="{{ @url('img/'.$d->foto) }}" >
							<div class="product">
							<span class="product-name">{{$d->nama_produk}}</span> <br>
							<span class="product-price"><b>{{$d->harga_produk}}</b></span>
							<a href="{{@url(strtolower($d->categories->nama_kategori).'/'.$d->permalink)}}">
							<button class="btn btn-blue btn-buy">Beli</button>
							</a>
							</div>
						</div>
				</div>
			</div>	
	@endforeach
</div>

@endsection