@extends('layouts.template')

@section('title', 'Riwayat Checkout')

@section('content')

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="text-align: center; margin-bottom:80px;">
					<h2>Riwayat Checkout</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
        		<table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Detail pemesanan</th>
                            <th>Total pembayaran</th>
                            <th>Foto bukti pembayaran</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <button class="btn btn-info" style="color: white" data-toggle="modal"
                                        data-target="#view-data">
                                        <i class="fas fa fa-eye"></i> 
                                        Detail pemesanan
                                    </button>
                                </td>
                                <td>@currency($data->total_price)</td>
                                @if ($data->photo)
                                    <td>
                                    <img class="hvr-pulse img-responsive" 
                                        src="{{url('/assets/img/product/', $data->photo)}}"
                                        style="width: 70px;">
                                    </td>
                                @else
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit-data{{$data->payment_id}}">
                                            <i class="fas fa fa-upload"></i> 
                                            Upload bukti pembayaran
                                        </button>
                                    </td> 
                                @endif
                                <td>{{ $data->validation }}</td>
                                @if($data->validation_id == 2)
                                    <td>
                                        Alamat {{ $data->city_name }} {{ $data->full_address }}    
                                        Estimasi barang sampai {{ $data->etd }} hari
                                    </td>
                                @else
                                    <td></td>    
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
      		</div>
    	</div>
  	</div>
</section>
@stop

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
                Nama Barang
                <ol>
                    @php $no = 0; @endphp
                    @foreach($products as $item)
                        <li style="color: black; font-size:18px;"> 
                           {{++$no}}. {{$item->product->product_name }}.
                           Jumlah barang yang dipesan: {{$item->qty}}
                        </li>   
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>


@foreach($datas as $data)
    <div class="modal fade" id="edit-data{{$data->payment_id}}" tabindex="-1" role="dialog"
        aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Upload bukti pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('payment', $data->payment_id)}}" method="POST" 
                        enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <input type="file" name="photo">
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
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
@endforeach