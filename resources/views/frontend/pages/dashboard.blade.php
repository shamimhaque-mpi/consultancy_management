@extends('frontend.layouts.app')


@section('title', 'Dashboard')

@section('content')

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
@endsection


@section('style')
<style>
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

.service .price {
	
}
</style>

@endsection