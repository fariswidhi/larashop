@extends('user.side')

@section('div')

		<div class="wrap-panel">
			<div class="panel" style="box-sizing: border-box;">
					<h1>Profil</h1>
			<table class="table table-striped">
				<tbody>
					<tr>
						<td>Username</td><td>{{Auth::user()->username}}</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td><td>{{Auth::user()->nama_lengkap}}</td>
					</tr>
					<tr>
						<td>Email</td><td>{{Auth::user()->email}}</td>
					</tr>
					<tr>
						<td>No Hp</td><td>{{Auth::user()->no_hp}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td>{{Auth::user()->jk == 1 ? 'Laki-Laki':'Perempuan'}}</td>
					</tr>
					<tr>
						<td>Alamat</td><td>{{Auth::user()->alamat}}</td>
					</tr>
				</tbody>
			</table>
			<a href="{{@url('profile/change')}}">
				Ubah Profil
			</a>
			</div>
			</div>

@endsection