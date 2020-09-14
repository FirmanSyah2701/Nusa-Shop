@extends('admin.template')
@section('title', 'Modal')

@section('content')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Modal</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Modal</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Modal</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#addModal" id="#modalScroll">Tambah Modal</button>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Modal</th>
                    <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                  <tr>
                    <td> {{ ++$i }} </td>
                    <td> @currency($data->capital) </td>
                    <td> @date($data->date) </td>
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
          <h5 class="modal-title" id="addModalTitle">Tambah Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('capitalPost')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Modal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="capital" placeholder="Masukkan modal">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="month" class="form-control" name="date">
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