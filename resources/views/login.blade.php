<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>

	<div class="container">
		<center>Login ke TokoOnline</center>
		<div class="wrap-panel">
			<div class="panel">
				<div style="">
					<div class="group">
					<label>Username</label>
					<input type="text" name="" class="form-text">
					</div>
					<div class="group">
					<label>Password</label>
					<input type="text" name="" class="form-text">
					</div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
					<div class="group">
						<button class="btn btn-login">Login</button>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap-panel">
			<div class="panel">
				Baru di TokoOnline? <a href="#">Daftar</a>
			</div>
		</div>
	</div>

	<style type="text/css">
	body{
		background: #eee;
		padding: 0;
		font-family: arial;
		margin: 0;
	}


		.container{
			width: 25%;
			margin: 0 auto;
			margin-top: 5%;

		}

		@media(max-width: 768px){
			.container{
				width: 100%;
			}
		}
		.wrap-panel{
			padding: 10px;
		}
		.panel{
			background: #fff;
			padding: 20px;
		}
		.group{
			margin: 10px;
		}
		.form-text{
			width: 95%;
			height: 20px;
			padding: 5px;
		}
		.btn{
			border:none;
			background: none;
		}
		.btn-login{
			background: #367fa9;
			color: #fff;
			width: 100%;
			height: 30px;
		}
		label{
			font-weight: bold;
		}
		a{
			text-decoration: none;
			color: #000;
		}
	</style>
</body>
</html>