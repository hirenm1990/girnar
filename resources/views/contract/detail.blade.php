@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Contract Details</b>
                @foreach($shipments as $shipment)
                  <a href="{{ URL::to('/') }}/shipment/edit/{{ $shipment->id }}" class="btn btn-primary btn-xs">{{ $shipment->shipment }}</a>
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
                <table class="table table-bordered">
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
                </table>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
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