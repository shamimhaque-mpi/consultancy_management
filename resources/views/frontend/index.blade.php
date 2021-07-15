<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>{{settings()->company_name}}</title>
    <link rel="icon" href="{{asset(settings()->fav_icon)}}" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

<style>

    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-size: 13px!important;
        font-weight: 400;
        font-family: Poppins,Helvetica,sans-serif;
        -ms-text-size-adjust: 100%;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
	.nav-wrapper {
		background: var(--cyan);
	}
	.custome-nav {
		display: flex;
		justify-content: space-between;
	}
	.custome-nav .logo img{
		height: 100%;
		object-fit: cover;
	}
	.custome-nav .info {

	}
	.submenu, .contact-info, .Log-info {
		width: 100%;
		padding: 3px;
		background: #198798;
		display: flex;
		justify-content: center;
		margin: 6px 0px;
	}
	.contact-info, .Log-info {
		background: none;
	}
	.custome-nav .info ul {
		display: flex;
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.custome-nav .info ul li a {
		display: block;
		color: #fff;
		font-size: 13px;
		margin-left: 10px;
	}
	.custome-nav .info ul li a {
		display: block;
		color: #fff;
		font-size: 13px;
		margin-left: 10px;
		text-decoration: none;
	}
	.custome-nav .submenu ul li a {
		font-size: 12px;
	}
	.custome-nav .info ul li a:hover {
		color: #5be5fb;
	}
	.custome-nav .info ul li input {
	    border: 1px solid #ddd;
	    padding: 3px 10px;
	    margin-left: 2px;
	    border-radius: 3px;
	    outline: none;
	}
	.custome-nav .info ul li input[type='submit'] {
	    font-size: 15px;
	    padding: 3px 9px;
	    background: #27bcd4;
	    border-color: #25c0d8;
	    color: aliceblue;
	    font-weight: 500;
	    padding: 1px 8px;
	    cursor: pointer;
	}
	.slider {
		height: 310px;
		margin-top: -1px;
	}
	.slider img {
		width: 100%;
		height: 310px;
		object-fit: cover;
	}
	.custome-col {
		width: 20%;
		padding: 0 15px;
		box-sizing: border-box;
		margin-bottom: 15px;
	}
.service {
    width: 155px;
    height: 155px;
    text-align: center;
    background: aliceblue;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    position: relative;
    border-radius: 7px;
}
.service::before, .service::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 80%;
    width: 80%;
    border: 2px solid #ddd;
}
.service::after {
    width: 15%;
    height: 14%;
    border-left: 0;
    border-bottom: 0;
    left: initial;
    right: 23px;
    top: 23px;
    transform: none;
}
.service-title {
    max-width: 80%;
    margin: auto;
    overflow: hidden;
    font-size: 14px;
}
.logo {
    overflow: hidden;
    height: 105px;
}
</style>


</head>
<body>
    <div id="app">
        <div class="nav-wrapper">
        	<div class="custome-nav container">
	        	<div class="logo">
	        		<img src="{{asset(settings()->logo)}}">
	        	</div>

	        	<div class="info">
	        		<div class="contact-info">
	        			<ul>
	        				<li><a href="#">Phone:{{settings()->company_mobile}}</a></li>
	        				<li><a href="#">E-mail:{{settings()->company_email}}</a></li>
	        				<li><a href="#">Time: 09:00:00 - 06:00:00</a></li>
	        			</ul>
	        		</div>
	        		<div class="submenu">
	        			<ul>
	        				<li><a href="#">HOME</a></li>
	        				<li><a href="#">CHI SLAMO</a></li>
	        				<li><a href="#">SERVIZI</a></li>
	        				<li><a href="#">CONTACTTI</a></li>
	        				<li><a href="#">CARRELO</a></li>
	        			</ul>
	        		</div>
	        		<div class="Log-info">
	        			<form method="POST" action="{{route('user.login')}}">
	        				@csrf
		        			<ul>
		        				<li><input type="email" name="email" value="{{old('email')}}" placeholder="Enter Your E-mail"></li>
		        				<li><input type="password" name="password" placeholder="Enter Your Password"></li>
		        				<li><input type="submit" value="Login"></li>
		        			</ul>
		        		</form>
	        		</div>
	        	</div>
	        </div>
        </div>
        @if(session()->has('error'))
        <div class="container">
        	<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
			  <strong>WARNING!!</strong> {{session()->get('error')}}
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
        </div>
        @endif
        <div class="container overflow-hidden">
            <div class="slider">
            	<img src="{{asset('public/images/family.png')}}">
            </div>
            <div class="row">
	            <div class="col-md-1"></div>
	            <div class="col-md-10">
		            <div class="row mt-4">
		            	<div class="col-md-12">
		            		<h2 class="text-center mb-5 mt-3">CAP PATRONATO</h2>
		            	</div>

		            	@if(!empty($services)) @foreach($services as $row)
		            	<div class="custome-col">
		        			<div class="service">
		        				<div class="w-100">
			        				<div class="service-title">{{$row->service_name}}</div>
		        				</div>
		        			</div>
		            	</div>
		            	@endforeach @endif

		            </div>
	            </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
