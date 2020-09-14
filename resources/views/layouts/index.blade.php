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
					<p>Join the millions who buy and sell from each other 
						<br> everyday in local communities around the world
					</p>
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
				<div style="text-align: center; margin-bottom:80px;">
					<h1>Produk Kami</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-3">
				<div class="category-sidebar">
					<form action="{{url('/searchProduct')}}" method="get">
						<input type="search" size="22" name="search" placeholder="Cari disini"
							style="margin-bottom: 12px; padding:8px;" required>
						<button type="submit" class="btn btn-sm btn-primary">
							<i class="fas fa fa-search"></i>
						</button>
					</form>
					<div class="widget category-list">
						<h4 class="widget-header">Kategori</h4>
						<ul class="category-list">
						@foreach ($categories as $category)
							<li>
								<a href="{{route('productByCategory', $category->category_id)}}">
									{{ $category->category_name }}
								</a>
							</li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>

			@if(count($products) == 0)
				<div style="margin-left: 20%; margin-top:10%;"> 
					<h3> Data tidak ditemukan </h3>  
				</div>
			@endif
			
			@foreach ($products as $product)
			<!-- offer 01 -->
			<div class="col-sm-12 col-lg-3">
				<!-- product card -->
				<div class="product-item bg-light">		
					<div class="card">
						<a href="" data-toggle="modal" 
							data-target="#detailModal-{{$product->product_code}}" id="#modalScroll">
							<div class="thumb-content">
								<div class="price">@currency($product->price)</div>
								<img class="card-img-top img-fluid" 
									src="{{url('/assets/img/product/', $product->photo)}}" alt="Card image cap">
							</div>
						</a>
						<div class="card-body">
							<h4 class="card-title">{{ $product->product_name }}</h4>
							<ul class="list-inline product-meta">
								<li class="list-inline-item">
									<i class="fa fa-folder-open-o"></i> 
									{{ $product->category->category_name }}
								</li>
							</ul>
							<p>{{$product->description}}</p>	
							<a href="" data-toggle="modal" 
								data-target="#detailModal-{{$product->product_code}}" id="#modalScroll">
								Lihat detail
							</a>
						</div>
					</div>
				</div>
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
							<img width="400px" height="150px" 
								src="{{url('/assets/img/product/', $product->photo)}}">
						</div>
						<div class="col-md-5">
							<form action="{{route('cartPost')}}" method="POST">
								@csrf
								<input type="hidden" name="product_code" value="{{$product->product_code}}">
								<h3> {{ $product->product_name }} </h3>
								<p> {{ $product->description }}  </p>
								<p> Tersedia: {{$product->qty}} </p>
								<p>	
									@if($product->qty > 0)
										Jumlah:
										<input style="width:40%; margin-left:5pxl" id="qty1" 
											type="number" name="qty" min="1"
											max="{{$product->qty}}" required>
									@endif
								</p>	
								<p> <h2>Harga: @currency($product->price) </h2></p>	
						</div>
					</div>
					
					<div style="float: right">
						@if (session('customer_id'))
							@if($product->qty > 0)
								<button class="btn btn-main" type="submit" name="keranjang">
									Tambahkan keranjang
								</button>	
								<button class="btn btn-danger" type="submit" name="pesanan">
									Checkout
								</button>
							@endif
						@else
							<button class="btn btn-main" type="submit" 
								name="keranjang" title="login terlebih dahulu">
									Tambahkan keranjang
							</button>
							<button class="btn btn-danger" type="submit" 
								name="pesanan" title="login terlebih dahulu">
								Buat pesanan
							</button>
						@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach

<script>
	$('input[name="qty1"]').on('change', function(){
		$("#qty2").html(qty);
		console.log($("#qty2").html(qty));
	});	
</script>
@stop
