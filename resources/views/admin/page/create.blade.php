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


	      			@if($type == 'select-kategori')
	      			<select class="form-control" name="{{$input}}">
	      				@foreach($dataselect as $d)
	      					<option value="{{$d->id}}">{{$d->nama_kategori}}</option>
	      				@endforeach
	      			</select>
	      			@elseif($type == 'select-diskon')
	      			<select class="form-control" name="{{$input}}">
	      					<option value="0">Tidak</option>
	      				@foreach($diskons as $d)
	      					<option value="{{$d->id_diskon}}">{{$d->nama}}</option>
	      				@endforeach
	      			</select>
	      				@elseif($type == 'select-aktif')
	      			<select class="form-control" name="{{$input}}">
	      					<option value="1">Ya</option>
	      					<option value="0">Tidak</option>
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