<html>
<head>
	<title></title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
  <link rel="stylesheet" href="style.css">

</head>
<body>
	<header>
		<div class="brand">

				<div style="float: left;padding:0;"><button class="btn btn-transparent btn-nav" >&#9776;</button></div>

				<a href="#">Logo</a></div>

	</header>
	<section class="nav" >
		<ul>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
<!--       <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
            </a></li> -->
<!--             <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="TE52eHrCypL2uGdCEp7Y5MXXv52LUCZLHj4tcCk8">
            </form> -->
		</ul>
	</section>
	<section class="main">
  	    @yield('content')
	</section>
</body>
<script src="jquery.min.js"></script>
<script src="effect.js"></script>
</html>
