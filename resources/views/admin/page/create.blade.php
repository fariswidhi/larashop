@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	      	<h3>Create {{$title}}</h3>

	      	<div class="row">
	      		<div class="xl-4">
	      			<form enctype="multipart/form-data" action="{{route($page.'.store')}}" method="post">
	      			{{csrf_field()}}
	      			@foreach($form as $input => $type)
	      			<label>{{ ucfirst($input) }}</label>


	      			@if($type == 'select')
	      			<select class="form-control" name="{{$input}}">
	      				@foreach($dataselect as $d)
	      					<option value="{{$d->id}}">{{$d->nama_kategori}}</option>
	      				@endforeach
	      			</select>
	      			@elseif($type == 'textarea')
	      			<textarea name="{{$input}}" class="form-control"></textarea>
	      			@else
	      			<input type="{{$type}}" name="{{$input}}" class="form-control" placeholder="{{$input}}">
	      			@endif
	      			@endforeach
	      			<button class="btn btn-primary" type="submit">Save</button>
	      		</form>
	      		</div>
	      	</div>
		</div>

</div>


@endsection