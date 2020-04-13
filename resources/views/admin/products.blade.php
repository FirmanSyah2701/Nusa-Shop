@extends('admin.template')
@section('title', 'Data Barang')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach  
              </ul>  
            </div>     
          @endif
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#addModal" id="#modalScroll">Tambah barang</button>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#edit-data{{$product->product_code}}" id="#modalScroll">Edit</button> 
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->

  <!-- modal tambah -->
   <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                  <label for="" class="col-sm-3 col-form-label">Kategori</label>
                  <div class="col-sm-9">
                      <select name="category_id" class="form-control">
                        <option value="">Pilih</option>
                          @foreach ($categories as $category)
                            @if ('category_id' == $category->category_id)
                              <option value="{{$category->category_id}}" selected>{{$category->category_name}}</option>
                            @else                            
                              <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                            @endif
                          @endforeach  
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Foto Barang</label>
                    <div class="col-sm-9">
                        <input type="file" name="photo" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><span class="fa fa-plus-circle"></span> Tambah data</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times-circle"></span> Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal tambah -->

@foreach ($products as $data)
<!-- Modal Ubah Data  -->
<div id="edit-data{{$data->product_code}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="#" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                
              <div class="row form-group">
                <label class="col-sm-4 control-label">Kode barang</label>
                <div class="col-sm-8">                    
                  <input type="text" class="form-control" required value="{{$data->product_code}}" disabled>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">                    
                        <a class="fancybox" href="{{URL::to('/')}}/assets/img/product/{{ $data->photo }}" title="Perbesar"></a>
                        <input type="file" class="form-control" name="photo" required>
                        <small class="form-text text-muted">JPG|JPEG|PNG Max 5MB</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach  
@stop