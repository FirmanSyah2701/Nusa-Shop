@extends('admin.template')
@section('title', 'Data Kategori Barang')

@section('content')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Kategori Barang</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Data Kategori Barang</li>
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
          @elseif (session()->has('success'))
            <div id='msg' class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                {{session()->get('success')}}
            </div>
          @endif
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Barang</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#addModal" id="#modalScroll">
                <i class="fas fa fa-plus"></i> Tambah kategori barang
            </button>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                    <th style="width:5%">No</th>
                    <th style="width:60%">Nama Kategori</th>
                    <th style="width:25%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td> 
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                          data-target="#edit-data{{$category->category_id}}" id="#modalScroll">
                          <i class="fas fa fa-pencil-alt"></i>
                        </button> 
                        <div style="margin-right:150px; float:right;">
                          <form action="{{ route('category.destroy', $category->category_id)}}" 
                              method="POST">
                              @csrf
                              @method('DELETE')
                              
                              <button type="submit" class="btn btn-danger">
                                <i class="fas fa fa-trash"></i>
                              </button>
                          </form>
                        </div>
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalTitle">Tambah Kategori Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('category.store')}}" method="POST">
              @csrf
              <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">
                    Nama Kategori Barang
                  </label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="category_name" 
                        placeholder="Masukkan kategori barang">
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
  
  <!-- modal ubah -->
  @foreach ($categories as $data)
    <div class="modal fade" id="edit-data{{$data->category_id}}" tabindex="-1" role="dialog"
      aria-labelledby="addModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Ubah kategori barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="{{route('category.update', $data->category_id)}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Nama Kategori Barang</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" 
                            name="category_name" value="{{$data->category_name}}">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success">
                        <span class="fa fa-plus-circle"></span> Simpan data
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
  @endforeach
@stop