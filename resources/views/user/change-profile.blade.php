@extends('user.side')

@section('div')

		<div class="wrap-panel">
			<div class="panel" style="box-sizing: border-box;">
					<h1>Profil</h1>
					<form action="{{@route('change.profile')}}" method ="post" enctype="multipart/form-data">
						{{@csrf_field()}}
			<table class="table table-striped">
				<tbody>if
					<tr>
						<td>Username</td><td><input type="text" class="input" disabled value="{{Auth::user()->username}}"></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td><td><input type="text" class="input" name="nama" value="{{Auth::user()->nama_lengkap}}"></td>
					</tr>
					<tr>
						<td>Email</td><td><input type="text" class="input" name="email" value="{{Auth::user()->email}}"></td>
					</tr>
					<tr>
						<td>No Hp</td><td><input type="text" class="input" name="no_hp" value="{{Auth::user()->no_hp}}"></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td><select name="jk" class="input"><option value="1">Laki Laki</option>Laki<option value="2">Perempuan</option></select></td>
					</tr>
					<tr>
						<td>Alamat</td><td><textarea name="alamat">{{Auth::user()->alamat}}</textarea></td>
					</tr>
					<tr>
						<td>Foto</td><td><input type="file" class="input" name="foto"></td>
					</tr>
				</tbody>
			</table>
			<center>
			<button type="submit" class="btn btn-blue">Simpan</button></center>
			</form>
			</div>
			</div>



@endsection