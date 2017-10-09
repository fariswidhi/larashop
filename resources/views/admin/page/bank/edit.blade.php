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
	      			<label>Bank</label>
					<input type="text" name="bank" class="form-control" placeholder="bank" value="{{$data->bank_name}}">
	      			<label>Name</label>
					<input type="text" name="name" class="form-control" placeholder="name" value="{{$data->name}}">
	      			<label>Rekening</label>
	      			<input type="number" name="rekening" class="form-control" placeholder="rekening" value="{{$data->rekening}}">
	      			<button class="btn btn-primary" type="submit">Save</button>

	      		</form>


	      		</div>
	      	</div>
		</div>

</div>




@endsection