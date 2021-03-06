@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="card">
                <div class="card-header"><b>Contract Details</b>
                <a href="{{ URL::to('/') }}/contract/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Contract</a>
                </div>

                <div class="card-body">
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
                <table id="shipment" class="table table-bordered">
                    <thead>
                        <th>Sr No.</th>
                        <th>Contract No</th>
                        <th>Contract Date</th>
                        <th>CI No.</th>
                        <th>Buyer Name</th>
                        <th>Destination</th>
                        <th>Products</th>
                        <th>Shipment</th>
                        <th>DO</th>
                        <th>RM</th>
                        <th>SF</th>
                        <th>CI</th>
                        <th>Dollor Exchange<br>Rate</th>
                        <th>Action</th>
                    </thead>
                </table>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(document).ready(function() {
    $('#shipment').DataTable({
      "processing": true,
      "serverSide": true,
      "lengthMenu": [10,25,50,100],
      "ajax": "{{ url('/') }}/contract/data",
      "columns": [
          {data: 'DT_Row_Index'},
          {data: 'contract_no'},
          {data: 'contract_date'},
          {data: 'ci_no'},
          {data: 'buyer_id'},
          {data: 'destination'},
          {data: 'products'},
          {data: 'shipment'},
          {data: 'do'},
          {data: 'rm'},
          {data: 'sf'},
          {data: 'ci'},
          {data: 'contract.dollor_exchange_rate'},
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