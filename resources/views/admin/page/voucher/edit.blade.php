@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	      	<h3>Edit {{$title}}</h3>

	      	<div class="row">
	      		<div class="xl-4">

	      			<form enctype="multipart/form-data" action="{{route($page.'.update',$data->id_voucher)}}" method="post">
	      			{{csrf_field()}}
	      			{{method_field('PUT')}}
	      			<label>Kelipatan</label>

				<input type="number" name="kelipatan" class="form-control" placeholder="kelipatan" value="{{$data->banyak_transaksi}}">
	      		<label>Persen</label>
	      		<input type="number" name="persen" class="form-control" placeholder="persen" value="{{$data->persen}}">
	      		<label>Aktif</label>
	      		<select class="form-control" name="aktif">
	      					<option {{$data->aktif == 1 ? 'selected' :''}} value="1">Ya</option>
	      					<option {{$data->aktif == 0 ? 'selected' : ''}}  value="0">Tidak</option>
	      			</select>

	      			<button class="btn btn-primary" type="submit">Save</button>
	      		</form>
	      		</div>
	      	</div>
		</div>

</div>


@endsection