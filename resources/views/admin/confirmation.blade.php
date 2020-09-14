@extends('admin.template')
@section('title', 'Konfirmasi Pembayaran')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pembayaran</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Detail pemesanan</th>
                    <th>Pembeli</th>
                    <th>No telp</th>
                    <th>Alamat</th>
                    <th>Kurir</th>
                    <th>Total</th>
                    <th>Foto</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($datas as $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                      <button class="btn btn-info" style="color: white" data-toggle="modal"
                        data-target="#view-data">
                        <i class="fas fa fa-eye"></i> Detail pemesanan
                      </button>
                    </td>
                    <td>{{$data->customer_name}}</td>
                    <td>{{$data->number_phone}}</td>
                    <td >
                      Provinsi : {{ $data->province }}. 
                      Kota : {{ $data->city_name }}. 
                       {{ $data->full_address }}.
                    </td>
                    <td > 
                      Kurir: {{ $data->courier }} Layanan: {{ $data->service}}
                    </td>
                    <td > @currency($data->total_price) </td>
                    @if($data->photo)
                      <td> <a href="{{route('download', $data->payment_id)}}" class="btn btn-primary">
                            Download </a> 
                      </td>
                    @else
                      <td>Foto belum diupload</td>
                    @endif
                    
                    @if ($data->validation == "belum diproses")
                      <td>  
                        <form action="{{url('confirmationUpdate', $data->payment_id)}}" method="POST">
                          @csrf
                          @method('PUT')
                          <button class="btn btn-success" name="2" type="submit">
                            Diproses
                          </button>
                          <button class="btn btn-danger" name="4" type="submit">
                            Ditolak
                          </button>
                        </form>
                      </td>
                      @elseif($data->validation == "sedang diproses")
                      <td>  
                        <form action="{{url('confirmationUpdate', $data->payment_id)}}" method="POST">
                          @csrf
                          @method('PUT')
                          <button class="btn btn-success" name="3" type="submit">
                            Sudah terkirim
                          </button>
                        </form>
                      </td>
                      @else
                      <td>{{ $data->validation }}</td>
                    @endif
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
  @foreach ($pemesanan as $item)
  <div class="modal fade" id="view-data" tabindex="-1" role="dialog"
    aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Detail pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                      <th>No</th>
                      <th>Barang</th>
                      <th>Jumlah</th>
                      <th>Kategori</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 0; @endphp
                  @foreach ($pemesanan as $item)
                  <tr>
                    <td>{{++$no}}.</td>
                    <td>{{$item->product_name }}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->category_name}}</td>
                  </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

@endforeach
@stop