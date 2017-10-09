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
		<input type="text" name="name" class="form-control" placeholder="name" value="{{$data->nama_kategori}}">
	    <button class="btn btn-primary" type="submit">Save</button>

	      		</form>


	      		</div>
	      	</div>
		</div>

</div>




@endsection