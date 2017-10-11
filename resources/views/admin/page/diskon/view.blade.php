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
  	<table class="table table-striped" >
    <thead>
    <th>#</th>
        <th>Diskon</th>
        <th>Potongan</th>
      </thead>
  <tbody class="tbody">
    @foreach($data as $d)

    @php
    $potongans = explode(',',$d->potongan);
    @endphp
            <tr>
            <td></td>

           <td>{{$d->nama}}</td>
           <td>@foreach($potongans as $potongan) {{str_replace(' ','+',$potongan)}} @endforeach</td>
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

          </tbody>
</table>



</div>


        <button  class="btn btn-primary btn-previous">Sebelumnya</button>
          <button  class="btn btn-primary btn-next">Selanjutnya</button>
    </div>


@endsection