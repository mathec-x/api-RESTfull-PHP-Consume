<?php 
function ForceHTTPS() 
{
	if ($_SERVER[‘HTTPS’] != "on") 
	{
	$url = $_SERVER[‘SERVER_NAME’];

	$new_url = "https://" . $_SERVER["HTTP_HOST"] ."";
	header("Location: $new_url/home/");
	exit;
	} 
	else 
	{
		header("Location: /home");
	}
}

//error_reporting(0); 
//header("Connection: close\r\n");
//header("Cache-Control: no-cache, must-revalidate"); 
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
//ForceHTTPS(); 
//header ("location: Home");
?>

<!DOCTYPE html>
<html ng-app="scotchApp">
<head>
<title>MATHEC - minha aplicação</title>
	<meta http-equiv="Content-Language" content="pt-br" />
	<meta charset="utf-8">
	<meta name="description" content="Aplicação de teste.">
	<meta name="keywords" content="php, html">
  	<meta name="author" content="Matheus Santos Correa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1, user-scalable=no">
	<link rel="manifest" href="manifest.json">
	<meta name="mobile-web-app" content="yes">
	<link rel="icon" sizes="192x192" href="img/launcher-icon-3x.png">
	<link rel="shortcut icon" type="image/png" href="img/launcher-icon-1x.png"/>	

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="libs/materialize/css/materialize.css" />
</head>
<body>
<header>
	<nav>
	    <div class="nav-wrapper">
	      <a href="#!" class="brand-logo center">M</a>
	      <a data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="#!">Documentação</a></li>
	        <li><a href="#!aplication">Aplicação</a></li>
	      </ul>
	    </div>
	  </nav>
  <ul id="slide-out" class="sidenav">
    <li><a class="waves-effect waves-light" href="#!">Documentação</a></li>
    <li><a class="waves-effect waves-light" href="#!aplication">Aplicação</a></li>
    <li><a class="waves-effect waves-light modal-trigger" href="#modal">Create</a></li>
  </ul>
</header>
  <!-- Modal Structure -->
<div id="modal" class="modal"></div>
<main ng-view style="position: absolute;width: 100%"></main>
<a class="waves-effect waves-light btn-floating btn-large modal-trigger" href="#modal"><i class="material-icons">edit</i></a>
<script src="libs/js/jquery.min.js"></script>
<script src="libs/materialize/js/materialize.min.js"></script>
<script src="libs/js/site.js"></script>
<!-- load angular, ngRoute, ngAnimate -->
<script src="libs/js/angular/angular.min.js"></script>
<script src="libs/js/angular/angular-route.js"></script>
<script src="libs/js/angular/angular-animate.js"></script>
<script src="libs/materialize/js/materialize.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.2/angular-materialize.min.js"></script>-->
<script src="controllers/route.config.js"></script>       
</body>
</html>