@extends('user.index')

@section('content')

<div class="row">
	<div class="xl-3">
		<div class="wrap-panel">
			<div class="panel" >
				<div class="wrap-img">
					<center>
					<img src="{{@url('img/profile.jpg')}}" class="img-circle"> 
					<h3>{{Auth::user()->username}}</h3>
					<h5>{{ $UserTransaction->count() == null ? '0' : $UserTransaction->first()->total_voucher }}</h5>
					</center>					
				</div>

					<div style="display: block;">
						<center>
						<h3></h3>
							
						</center>
						<ul class="menu-profile">
							<li>
								<a href="{{@url('profile')}}">Profil</a>
							</li>
							<li>
								<a href="{{@url('transactions')}}">Transaksi</a>
							</li>
							<li>
								<a href="{{@url('cart')}}">Keranjang</a>
							</li>

						</ul>
					</div>
			</div>
		</div>
	</div>
		<div class="xl-6" >
			@yield('div')
		</div>
</div>


@endsection