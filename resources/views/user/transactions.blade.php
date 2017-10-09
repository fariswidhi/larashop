@extends('user.side')

@section('div')

		<div class="wrap-panel">
			<div class="panel" style="box-sizing: border-box;">
					<h1>Daftar Transaksi</h1>
					
			<table class="table table-striped">
				<tbody>
					@foreach($transactions as $data)
					<tr>
						<td><a href="{{@url('transaction/'.$data->id_transaksi)}}">{{$data->id_transaksi}}</a></td>
						<td>{{$data->nama_penerima}}</td>
						<td>{{$data->total}}</td>
						<td>{{$data->status_transaksi}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			</div>



@endsection