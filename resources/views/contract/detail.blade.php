@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="card">
                <div class="card-header"><b>Contract</b>
                Shipment :
                @foreach($shipments as $shipment)
                <a href="{{ URL::to('/') }}/shipment/edit/{{ $shipment->id }}" class="btn btn-info btn-sm">{{ $shipment->shipment }}</a>
                @endforeach
                </div>
                
                <div class="panel-body">
                @if (Session()->has('message')) 
                  <div class="alert alert-success msg" role="alert">
                    {{ Session()->get('message') }}
                  </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="home" aria-expanded="true">Basic</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab" aria-controls="profile">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="delivery-order-tab" data-toggle="tab" href="#delivery-order" role="tab" aria-controls="profile">Delivery Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="raw-material-tab" data-toggle="tab" href="#raw-material" role="tab" aria-controls="profile">Raw Material</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="stuffing-tab" data-toggle="tab" href="#stuffing" role="tab" aria-controls="profile">Stuffing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="comm-invoice-tab" data-toggle="tab" href="#comm-invoice" role="tab" aria-controls="profile">Comm. Invoice</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="vgm-tab" data-toggle="tab" href="#vgm" role="tab" aria-controls="profile">VGM</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="prints-tab" data-toggle="tab" href="#prints" role="tab" aria-controls="profile">Prints</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="upload-docs-tab" data-toggle="tab" href="#upload-docs" role="tab" aria-controls="profile">Upload Docs</a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab" data-toggle="tab" aria-controls="dropdown1">@fat</a>
                      <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a>
                    </div>
                  </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">b</div>
                  <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">...</div>
                  <div class="tab-pane fade" id="delivery-order" role="tabpanel" aria-labelledby="delivery-order-tab">d</div>
                  <div class="tab-pane fade" id="raw-material" role="tabpanel" aria-labelledby="raw-material-tab">...</div>
                  <div class="tab-pane fade" id="stuffing" role="tabpanel" aria-labelledby="stuffing-tab">s</div>
                  <div class="tab-pane fade" id="comm-invoice" role="tabpanel" aria-labelledby="comm-invoice-tab">...</div>
                  <div class="tab-pane fade" id="vgm" role="tabpanel" aria-labelledby="vgm-tab">v</div>
                  <div class="tab-pane fade" id="prints" role="tabpanel" aria-labelledby="prints-tab">...</div>
                  <div class="tab-pane fade" id="upload-docs" role="tabpanel" aria-labelledby="upload-docs-tab">u</div>
                </div>
                <!-- <table class="table table-bordered">
                    <tr>
                      <td><a href="{{ URL::to('/') }}/contract/edit/{{ $contract->id }}" class="btn btn-primary btn-sm"> Contract</a></td>
                      <td><a href="{{ URL::to('/') }}/shipments" class="btn btn-primary btn-sm"> Shipment</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> Delivery Order</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> Raw Material</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> Stuffing</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> Comm. Invoice</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> VGM</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> Print</a></td>
                      <td><a href="{{ URL::to('/') }}" class="btn btn-primary btn-sm"> Docs</a></td>
                    </tr>
                </table> -->
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(document).ready(function() {
    $('#contracts').DataTable({
      "processing": true,
      "serverSide": true,
      "lengthMenu": [10,25,50,100],
      "ajax": "{{ url('/') }}/contract/data",
      "columns": [
          {data: 'DT_Row_Index'},
          {data: 'contract_no'},
          {data: 'contract_date'},
          {data: 'buyer_id'},
          {data: 'dollor_exchange_rate'},
          {data: 'action'},
      ]
  });
});

$(document).on('click','.delete',function(e){
  e.preventDefault();

  if(confirm("Are you sure you want to delete this Contract?")){
    var linkUrl = $(this).attr('href');
    window.location.href = linkUrl;  
  }else{
    return false;
  }
});

</script>
@endsection