@extends('admin.index')

@section('content')


<div class="wrap">
	      <div class="wrap-body">
	      <a href="{{ @url(Request::segment(1).'/'.Request::segment(2).'/create') }}"><button class="btn btn-primary">+ Tambah</button></a>

				<h2>{{ $title }}</h2>
      @if(session('info'))
      {{session('info')}}
      @endif
			<table class="table table-striped" >
  	<thead>
    <th>#</th>
    <th>{{$head}}</th>
  </thead>
  <tbody class="tbody">
    <tr>
      <td colspan="2"><center>Data Tidak Ada</center></td>
    </tr>

  </tbody>
</table>

</div>


        <button  class="btn btn-primary btn-previous">Sebelumnya</button>
          <button  class="btn btn-primary btn-next">Selanjutnya</button>
    </div>


@endsection