@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	      	<h3>Create {{$title}}</h3>

	      	<div class="row">
	      		<div class="xl-4">
	      			<form enctype="multipart/form-data" action="{{route($page.'.store')}}" method="post">
	      			{{csrf_field()}}
	      			<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="nama">
	      			<label>Potongan</label>	
	      			<input type="text" name="potongan" class="form-control" placeholder="potongan">
	      			<label>Potongan Dua</label>	
	      			<input type="text" name="potongan2" class="form-control" placeholder="potongan">
	      			
	      			<label>Mulai</label>	
	      			<input type="date" name="mulai" class="form-control" placeholder="mulai">
	      			<label>Berakhir</label>
	      			<input type="date" name="berakhir" class="form-control" placeholder="berakhir">
	      			<button class="btn btn-primary" type="submit">Save</button>

	      		</form>
	      		</div>
	      	</div>
		</div>

</div>


@endsection