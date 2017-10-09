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
    @foreach($heads as $head)
    <th>{{$head}}</th>
    @endforeach
  </thead>
  <tbody class="tbody">
    @if(count($data) == 0)
    <tr>
      <td colspan="2"><center>Data Tidak Ada</center></td>
    </tr>
    @else
    @php
      $no = 1;
      @endphp
    @foreach($data as $d)
    <tr>
       <td>{{ $no++ }}</td>

      @foreach($tr as $tdata)
     <td>{{$d->$tdata}}</td>
      @endforeach
      <td>
        <a href="{{@url('admin/'.Request::segment(2).'/'.$d->$key.'/edit')}}">
        <button class="btn btn-info">Edit</button>
        </a>
             <form id="logout-form" action="{{@route($page.'.destroy',$d->$key)}}" method="POST" style="display: inline-block;">
              {{method_field('DELETE')}}
              {{csrf_field()}}
        <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>

    @endforeach
    @endif
  </tbody>
</table>

</div>


        <button  class="btn btn-primary btn-previous">Sebelumnya</button>
          <button  class="btn btn-primary btn-next">Selanjutnya</button>
    </div>


@endsection