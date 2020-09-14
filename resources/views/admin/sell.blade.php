@extends('admin.template')
@section('title', 'Data Penjualan')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h6>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Modal</th>
                    <th>Pendapatan</th>
                    <th>Laba/Rugi</th>
                    <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($datas as $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td> @currency($data->capital) </td>
                    <td> @currency($money) </td>
                    <td> @currency($profit) </td>
                    <td> {{ \Carbon\Carbon::parse($data->date)->translatedFormat('l, d F Y') }} </td>    
                    <td> </td> 
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
@stop