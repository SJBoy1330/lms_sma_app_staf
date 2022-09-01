<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Error</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #FBF8FF;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
	display: flex;
	height: 100vh;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

.wrapper-404 {
	display: flex !important;
	justify-content: center !important;
	align-items: center !important;
	flex-wrap: wrap;
}

p{
	font-size: 50px;
	font-weight: bold;
	margin-top: -25px;
	margin-bottom: 50px;
}

a.btn-404{
	width: 400px;
	height: 110px;
	font-size: 30px;
	font-weight: 600;
	background-color: #EC3528;
	border-radius: 50px;
	display: flex;
	justify-content: center;
	align-items: center;
	color: #FFFFFF;
	text-decoration: none;
}

a.btn-404:hover{
	transition: 0.5s;
	background-color: #FFFFFF;
	color: #EC3528;
	border: 3px solid #EC3528;
	border-radius: 50px !important;
}

</style>
</head>
<body>
	<div class="wrapper-404">
		<img src="<?= base_url()?>assets/ilustrasi/404_vector.svg" width="800" alt="">
		<p>Maaf, halaman tidak tersedia</p>
		<a href="<?= base_url('home')?>" class="btn-404">Kembali ke Dashboard</a>
	</div>
</body>
</html>