<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href="{{@url('css/style.css')}}">

</head>

<body>
	<header>
		<div class="wrap">
			<div class="header">
				<div class="row">
					<div class="s-8 xl-2 m-3">
					<div class="brand">
						<button class="btn-transparent" id="btn-nav" style="float: left;margin: 12px;">&#9776;</button>

						<a href="{{@url('')}}" class="logo">Toko Online</a>							

					</div>
				</div>
				<div class="xl-6 m-6">
					<div class="wrapper">

					<form action="{{@route('getsearch.product')}}" method="POST">
					{{@csrf_field()}}
					<input type="text" name="q" class="input search">

					</form>
					</div>

				</div>
				<div class="xl-4 m-3	 menu-desktop">
					<div class="wrapper">
						<ul class="menu"> @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <!-- {{ Auth::user()->email }}  --><span class="caret"></span>
                                </a>
                            </li>
                            <li><a href="{{@url('cart')}}">Cart </a></li>
                            <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                               </li>
                        @endguest
						</ul>
					</div>
				</div>
				<div class="s-3 menu-mobile">

					<button style="margin: 5px;" class="btn btn-blue btn-search">Cari</button>
						
				</div>
			</div>
		</div>
	</div>
	</header>

<div class="wrap-search">
	<div class="modal-search ">

		<div class="search-container">
				<span class="search-title">Cari</span>

					<form action="{{@route('getsearch.product')}}" method="POST">
						{{@csrf_field()}}
					<input type="text" name="q" class="input">
					<button type="submit" class="btn btn-blue btn-search">Cari</button>
				</form>
		</div>

	</div>
	
</div>


	<section style="padding-top: 75px;">
	<div class="category">
		<ul>
			@foreach($cats as $cat)
			<li><a href="{{@url('/'.strtolower($cat->nama_kategori))}}">{{$cat->nama_kategori}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="content">
		<div class="wrap-content">
			@yield('content')
		</div>
	<footer>
	a	
	</footer>
	</div>	
	</section>


</body>

	<script src="{{@url('js/jquery.min.js')}}"></script>
	<script>
		$(document).on('click','#btn-nav',function(){
			$(".category").toggleClass('toggleNav');
			$(".content").toggleClass('toLeft');
			if ($(".content").hasClass('toLeft')) {
				$(".panel-product").addClass('xl-3');
				$(".panel-product").removeClass('xl-2');
			}else{
					$(".panel-product").addClass('xl-2');
				$(".panel-product").removeClass('xl-3');
			}
		});
		$(document).on('click','.btn-search',function(){
			$(".wrap-search").toggleClass('show');
			$(".modal-search").toggleClass('show-box');
		});
		$(document).on('click','.wrap-search',function(e){
			if (e.target.id != $(this).attr('class') &&  !$(this).has(e.target).length ) {

			$(".wrap-search").toggleClass('show');
			$(".modal-search").toggleClass('show-box');

			}
		});
		  $(document).on('click','.btn-add-to-cart',function(){
    		addCart($(this).data('id'));
	  });

function addCart(id){

      var url = window.location.pathname;
      var url2 = url.substr(url.lastIndexOf('/') + 1);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$.ajax({
		url: url+'add-to-cart',
		type: 'POST',
		data: {product:id},
		dataType: 'json',
		success:function(response){
			if (response.status =='data sudah ada') {
				$(".btn-cart-"+id).text('X');
			}
			else{
				removeCart(id);
			}

		}

	});



  }
$(document).on('click','#btn-buy',function(){
	if ($("#qty").val() == '') {
		alert('Silahkan Isi Jumlah Barang');
	}
	else{
		$("#form-buy").submit();
	}
});
	$(document).ready(function(){


	$(".input-transaksi").keyup(function(){
			var id = $(this).data('id');
			var stok = $(this).data('stok');
			if ($(this).val() < 0 || $(this).val() == '') {

				$('.cart-total-'+id).text('0');
			}
			else{
				if ($(this).val() > parseInt(stok)) {
					alert('tidak bisa');
					$(this).val(0);
				}
				else{
					$(".cart-total-"+id).text(parseInt($(this).val()) * parseInt($(".cart-price-"+id).text()));
				}
			}

		});
		$('#cart-table tbody tr').each(function(){
			var c = $(this).find('.nt').html();

		});
				$("#qty").keyup(function(){
			var stock = parseInt($(".stock").text());
			var price = parseInt($(".price").text());
			if ($(this).val() > stock || $(this).val() < 0) {
					alert('tidak bisa');
					$(this).val(0);

			}
			else{
				$("#total").text(price * $(this).val());
				$("#banyak-produk").val($(this).val());
			}
		});
	});


	</script>
</html>