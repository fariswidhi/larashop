@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	      	<h3>Create {{$title}}</h3>

	      	<div class="row">
	      		<div class="xl-4">
	      			<form enctype="multipart/form-data" action="{{route($page.'.store')}}" method="post">
	      			{{csrf_field()}}
	      			<label></label>
	      			<button class="btn btn-primary" type="submit">Save</button>
	      		</form>
	      		</div>
	      	</div>
		</div>

</div>


@endsection