@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	     
				<h2>{{ $title }}</h2>
      @if(session('info'))
      {{session('info')}}
      @endif
		<table class="table table-striped" >
			<thead>
				<th>#</th>
				<th>User</th>
				<th>Total</th>
				<th>Tanggal Beli</th>
			</thead>
			<tbody>
				@if(count($data)==0)
				<tr>
					<td colspan="5"><center>Tidak Ditemukan</center></td>
				</tr>
				@else
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
						<select class="form-control" name="status" onchange="this.form.submit()">
						<option value="">Menunggu</option>
						<option {{$d->status_transaksi == 1 ? 'selected' : ''}} value="1">Ditolak</option>
						<option {{$d->status_transaksi == 2 ? 'selected' : ''}} value="2">Dikirm</option>
					</select>
					</form>
				</td>
				</tr>
				@endforeach
				@endif
			</tbody>

		</table>			
</div>

    </div>


@endsection