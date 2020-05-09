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
			@foreach ($products as $product)
			<!-- offer 01 -->
			<div class="col-sm-12 col-lg-3">
				<!-- product card -->
				<a href="" data-toggle="modal" data-target="#detailModal-{{$product->product_code}}" id="#modalScroll">
				<div class="product-item bg-light">		
					<div class="card">
						<div class="thumb-content">
							<div class="price">Rp {{ number_format($product->price) }}</div>
							<img class="card-img-top img-fluid" src="{{URL::to('/')}}/assets/img/product/{{ $product->photo }}" alt="Card image cap">
						</div>
						<div class="card-body">
							<h4 class="card-title">{{ $product->product_name }}</h4>
							<ul class="list-inline product-meta">
								<li class="list-inline-item">
									<i class="fa fa-folder-open-o"></i> {{ $product->category->category_name }}
								</li>
							</ul>
							<p class="card-text">{{$product->description}}</p>		
						</div>
					</div>
				</div>
				</a>
			</div>
			@endforeach		
		</div>
	</div>
</section>

<!-- modal detail barang -->
@foreach ($products as $product)
<div class="modal fade" id="detailModal-{{$product->product_code}}" tabindex="-1" role="dialog"
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
						<img src="{{URL::to('/')}}/assets/img/product/{{ $product->photo }}">
					</div>
					<div class="col-md-5">
					<form action="{{route('detailPost', $product->product_code)}}" method="POST">
						@csrf
						<input type="hidden" name="product_code" value="{{$product->product_code}}">
						<p> {{$product->description}}  </p>
						<p>Tersedia: {{$product->qty}}</p>
						<div class="container">
							Jumlah:
							<input style="margin-left:20px; padding:1px;" 
								type="button" onclick="decrement()" value="-">
							<input style="width:40%" id="qty" type="number" name="q" max="{{$count}}" min="1" required>
							<input style="padding:1px;" 
								type="button" onclick="increment()" value="+">
						</div>
						<p> <h2>Harga: Rp {{ number_format($product->price) }}</h2></p>	
					</div>
				</div>
				<div style="float:right">
					<a class="btn btn-main" href="{{url('cart')}}">Tambahkan keranjang</a>
					<button class="btn btn-danger" type="submit">Buat pesanan</a>
					</form>
				</div>
		  	</div>
		</div>
	</div>
</div>
@endforeach
<!-- modal detail barang -->
@stop
