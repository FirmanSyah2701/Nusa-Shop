@extends('layouts.template')

@section('title', 'Profile Anda')

@section('content')

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="text-align: center; margin-bottom:80px;">
					<h2>Profile Anda</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <p>Username : <span>{{ $account->username }}</span></p>
                <p>Nama : <span>{{ $account->name }}</span></p>
				<p>Nomer Telpon : <span>{{ $account->number_phone }}</span></p>
				
				<button class="btn btn-primary" type="button" data-toggle="modal"
					data-target="#edit-data{{session('customer_id')}}" id="#modalScroll">
						Ubah Akun
				</button>

            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="edit-data{{session('customer_id')}}" tabindex="-1" role="dialog"
	aria-labelledby="addModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addModalTitle">Ubah akun</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="{{route('profileUpdate', session('customer_id'))}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group row">
					<label for="" class="col-sm-3 col-form-label">Username: </label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" name="username" value="{{$account->username}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-sm-3 col-form-label">Nama: </label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="name" value="{{$account->name}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-sm-3 col-form-label">Nomer telpon</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="number_phone" value="{{$account->number_phone}}">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						<span class="fa fa-plus-circle"></span> Simpan data
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times-circle"></span> Close
					</button>
				</div>
			</form>
		</div>
	  </div>
	</div>
  </div>
@stop