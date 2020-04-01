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
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->name_product }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#editModal" id="#modalScroll">Edit</button> 
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
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="name_product" placeholder="nama barang">
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
                    <label for="" class="col-sm-3 col-form-label">Foto Barang</label>
                    <div class="col-sm-9">
                        <input type="file" name="photo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal tambah -->

  <!-- modal ubah -->
  @foreach ($products as $data)
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
  aria-labelledby="editModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalTitle">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('product.update', $data->product_code)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Kode Barang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="product_code" 
                      placeholder="Masukkan kode barang" disabled value="{{$data->product_code}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Nama Barang</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_product" 
                        placeholder="nama barang" value="{{$data->name_product}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Harga Barang</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="price" 
                        placeholder="harga barang" value="{{$data->price}}">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Stok</label>
                  <div class="col-sm-9">
                      <input type="number" min="0" name="qty" class="form-control" value="{{$data->qty}}">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Foto Barang</label>
                  <div class="col-sm-9">
                      <input type="file" name="photo">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- modal ubah -->
@endforeach
@stop