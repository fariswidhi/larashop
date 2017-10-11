@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	     
				<h2>{{ $title }}</h2>
      @if(session('info'))
      {{session('info')}}
      @endif

      <div style="float: right;">
      		<form method="get" action="{{@route('search.transaction')}}">
      		{{@csrf_field()}}	
      			<input type="text" name="q" class="form-control" placeholder="Cari">
      		</form>
      </div>
		<table class="table table-striped" >
			<thead>
				<th>#</th>
				<th>User</th>
				<th>Total</th>
				<th>Tanggal Beli</th>
			</thead>
			<tbody>
				@foreach($data as $d)
				<tr>
					<td>{{$d->id_transaksi}}</td>
					<td>{{$d->user->nama_lengkap}}</td>
					<td>{{$d->total}}</td>
					<td>{{$d->created_at}}</td>
					<td>
						<form action="{{@route('change.transaction')}}" method="post">
						{{@csrf_field()}}	
							<input type="hidden" name="transaction" value="{{$d->id_transaksi}}">

						<select class="form-control" name="status" onchange="this.form.submit()" {{ $d->status_transaksi==2 ? 'disabled':'' }}>
						<option {{$d->status_transaksi == 0 ? 'selected' : ''}} value="0">Menunggu</option>
						<option {{$d->status_transaksi == 2 ? 'selected' : ''}} value="2">Ditolak</option>
						<option {{$d->status_transaksi == 1 ? 'selected' : ''}} value="1">Dikirm</option>
					</select>
					</form>
				</td>
				</tr>
				@endforeach
			</tbody>

		</table>			

</div>


        <button  class="btn btn-primary btn-previous">Sebelumnya</button>
          <button  class="btn btn-primary btn-next">Selanjutnya</button>
<br>
		<b>Jika Anda Menolak Maka data tidak bisa diubah lagi</b>
    </div>



@endsection