@extends('layouts.template')

@section('title', 'Nusa Shop')

@section('content')
<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
				</div>			
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Produk</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-lg-3">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">Kategori</h4>
						<ul class="category-list">
							<li><a href="category.html">Lipstik <span>93</span></a></li>
							<li><a href="category.html">Bedak <span>233</span></a></li>
							<li><a href="category.html">Parfum  <span>183</span></a></li>
						</ul>
					</div>
				</div>
			</div>	
			<!-- offer 01 -->
			<div class="col-sm-12 col-lg-3">
				<!-- product card -->
				<a href="" data-toggle="modal" data-target="#addModal" id="#modalScroll">
				<div class="product-item bg-light">		
					<div class="card">
						<div class="thumb-content">
							<div class="price">$200</div>
							<img class="card-img-top img-fluid" src="{{url('assets/img/products/products-1.jpg')}}" alt="Card image cap">
						</div>
						<div class="card-body">
							<h4 class="card-title">11inch Macbook Air</h4>
							<ul class="list-inline product-meta">
								<li class="list-inline-item">
									<i class="fa fa-folder-open-o"></i>Electronics
								</li>
							</ul>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>		
						</div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-sm-12 col-lg-3">
				<!-- product card -->
				<div class="product-item bg-light">
					<div class="card">
						<div class="thumb-content">
							<div class="price">$200</div>
							<a href="">
								<img class="card-img-top img-fluid" src="{{url('assets/img/products/products-2.jpg')}}" alt="Card image cap">
							</a>
						</div>
						<div class="card-body">
							<h4 class="card-title"><a href="">Full Study Table Combo</a></h4>
							<ul class="list-inline product-meta">
								<li class="list-inline-item">
									<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
								</li>
							</ul>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>		
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-12 col-lg-3">
				<!-- product card -->
				<div class="product-item bg-light">
					<div class="card">
						<div class="thumb-content">
							<div class="price">$200</div>
							<a href="">
								<img class="card-img-top img-fluid" src="{{url('assets/img/products/products-3.jpg')}}" alt="Card image cap">
							</a>
						</div>
						<div class="card-body">
							<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
							<ul class="list-inline product-meta">
								<li class="list-inline-item">
									<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
								</li>
							</ul>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>		
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</section>

<!-- modal detail barang -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
	aria-labelledby="addModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
  		<div class="modal-content">
			<div class="modal-header">
	  			<h5 class="modal-title" id="addModalTitle">Detail Barang</h5>
	  			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
	  			</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-7">
						<img src="{{url('assets/img/products/products-3.jpg')}}">
					</div>
					<div class="col-md-5">
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam! </p>
						Jumlah: <input type="number" >
						<p> <h4>Harga:</h4></p>	
					</div>
				</div>
				<div style="float:right">
					<a class="btn btn-main" href="{{url('cart')}}">Tambahkan keranjang</a>
					<a class="btn btn-danger" href="{{url('checkout')}}">Buat pesanan</a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<!-- modal detail barang -->
@stop
