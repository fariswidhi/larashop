@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	      	<h3>{{$title}}</h3>

	      	<div class="row">
	      		<div class="xl-4">
	      		<form enctype="multipart/form-data" action="{{route($page.'.update',$id)}}" method="post">
	      			{{@method_field('PUT')}}
	      			{{@csrf_field()}}
	      			<label>Name</label>
					<input type="text" name="name" class="form-control" placeholder="name" value="{{$data->nama_produk}}">
	      			
	      			<label>Stok</label>
					<input type="number" name="stok" class="form-control" placeholder="stok" value="{{$data->stok_produk}}">
	      			
	      			<label>Price</label>
	      			<input type="number" name="price" class="form-control" placeholder="price" value="{{$data->harga_produk}}">
	      			
	      	<label>Deskripsi</label>
				<textarea name="deskripsi" class="form-control">{{$data->deskripsi}}</textarea>
				<label>Foto</label>
	      			<img src="{{@url('img/'.$data->foto)}}" style="width: 100%;">
	      			<input type="file" name="foto" class="form-control" placeholder="foto">
	      			
	      			<label>Kategori</label>
					<select class="form-control" name="kategori">
						@foreach($dataselect as $d)
	      				<option value="{{$d->id}}">{{$d->nama_kategori}}</option>
	      				@endforeach
	      			</select>

	      		<button class="btn btn-primary" type="submit">Save</button>
	      		</form>


	      		</div>
	      	</div>
		</div>

</div>




@endsection