@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="card">
                <div class="card-header"><b>Contract</b>
                Shipment :
                {{--
                @foreach($contract_ships as $contract)
                <a href="{{ URL::to('/') }}/contract/detail/{{ $shipment_id }}" class="btn btn-info btn-sm">{{ $contract->shipments->shipment_code }}</a>
                @endforeach
                --}}
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
                <div id="tabs">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="basic_tab" data-url="{{ URL::to('/') }}/contract/basic/{{ $shipment_id }}" data-toggle="tab" href="#basic"><i class="fa fa-pencil-square-o"></i> Basic</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-url="{{ URL::to('/') }}/contract/products/{{ $shipment_id }}" data-toggle="tab" href="#products"><i class="fa fa-cubes"></i> Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-url="{{ URL::to('/') }}/contract/deliveryorder/{{ $shipment_id }}" data-toggle="tab" href="#delivery-order"><i class="fa fa-file-text-o"></i> Delivery Order</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-url="{{ URL::to('/') }}/contract/rawmaterial/{{ $shipment_id }}" data-toggle="tab" href="#raw-material"><i class="fa fa-building-o"></i> Raw Material</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-url="{{ URL::to('/') }}/contract/stuffing/{{ $shipment_id }}" data-toggle="tab" href="#stuffing"><i class="fa fa-archive"></i> Stuffing</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-url="{{ URL::to('/') }}/contract/comminvoice/{{ $shipment_id }}" data-toggle="tab" href="#comm-invoice">Comm. Invoice</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="vgm-tab" data-url="{{ URL::to('/') }}/contract/vgm/{{ $shipment_id }}" data-toggle="tab" href="#vgm" role="tab" aria-controls="vgm">VGM</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="prints-tab" data-url="{{ URL::to('/') }}/contract/prints/{{ $shipment_id }}" data-toggle="tab" href="#prints" role="tab" aria-controls="prints">Prints</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="upload-docs-tab" data-url="{{ URL::to('/') }}/contract/uploaddocs/{{ $shipment_id }}" data-toggle="tab" href="#upload-docs" role="tab" aria-controls="upload-docs">Upload Docs</a>
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
                    <div class="tab-pane" id="basic" role="tabpanel">
                      
                    </div>
                    <div class="tab-pane" id="products" role="tabpanel"></div>
                    <div class="tab-pane" id="delivery-order" role="tabpanel"></div>
                    <div class="tab-pane" id="raw-material" role="tabpanel"></div>
                    <div class="tab-pane" id="stuffing" role="tabpanel"></div>
                    <div class="tab-pane" id="comm-invoice" role="tabpanel"></div>
                    <div class="tab-pane" id="vgm" role="tabpanel"></div>
                    <div class="tab-pane" id="prints" role="tabpanel"></div>
                    <div class="tab-pane" id="upload-docs" role="tabpanel"></div>
                  </div>
                </div>
                
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

  $('#tabs').on('click','#myTab a',function (e) {
    e.preventDefault();
    
    var url = $(this).attr("data-url");

    if (typeof url !== "undefined") {
        var pane = $(this), href = this.hash;

        // ajax load from data-url
        $(href).load(url,function(result){      
            pane.tab('show');
        });
    } else {
        $(this).tab('show');
    }
  });


  var hash = "#" + window.location.hash.substr(1);
  if(hash == "#") {
    hash = "#basic";
  }
  $('a[href="'+hash+'"]').click();
  
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