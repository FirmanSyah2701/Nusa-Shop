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
					<h2>Trending Ads</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-lg-3">
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-action active">
					  Cras justo odio
					</a>
					<a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
					<a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
					<a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
					<a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
				  </div></div>	
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

<!-- modal tambah -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
	aria-labelledby="addModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
  		<div class="modal-content">
			<div class="modal-header">
	  			<h5 class="modal-title" id="addModalTitle">Tambah Barang</h5>
	  			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
	  			</button>
			</div>
			<div class="modal-body">
				<form id="frmAdd" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" role="form">
					@csrf
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Kode Barang</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="product_code" placeholder="Masukkan kode barang">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Nama Barang</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="product_name" placeholder="nama barang">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Harga Barang</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="price" placeholder="harga barang">
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Stok</label>
						<div class="col-sm-9">
							<input type="number" min="0" name="qty" class="form-control">
						</div>
					</div>

					<div class="form-group row">
					<label for="" class="col-sm-3 col-form-label">Deskripsi</label>
					<div class="col-sm-9">
						<textarea name="description" class="form-control"></textarea>
					</div>
				</div>

					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Foto Barang</label>
						<div class="col-sm-9">
							<input type="file" name="photo" class="form-control" >
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">
							<span class="fa fa-plus-circle"></span> Tambah data
						</button>
						<button type="button" class="btn btn-info" data-dismiss="modal">
							<span class="fa fa-times-circle"></span> Close
						</button>
					</div>
				</form>
			</div>
  		</div>
	</div>
</div>
<!-- modal tambah -->
@stop
