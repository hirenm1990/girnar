@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Products</b>
                  <a href="{{ URL::to('/') }}/product/create" class="btn btn-primary btn-xs pull-right"><i class=""></i> Add</a>
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
                <table id="products" class="table table-bordered">
                    <thead>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>hs_code</th>
                        <th>shortcode</th>
                        <th>dbk_scheme_no</th>
                        <th>Action</th>
                    </thead>
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
    $('#products').DataTable({
      "processing": true,
      "serverSide": true,
      "lengthMenu": [10,25,50,100],
      "ajax": "{{ url('/') }}/product/data",
      "columns": [
          {data: 'DT_Row_Index'},
          {data: 'name'},
          {data: 'hs_code'},
          {data: 'shortcode'},
          {data: 'dbk_scheme_no'},
          {data: 'action'},
      ]
  });
});

$(document).on('click','.delete',function(e){
  e.preventDefault();

  if(confirm("Are you sure you want to delete this Product?")){
    var linkUrl = $(this).attr('href');
    window.location.href = linkUrl;  
  }else{
    return false;
  }
});

</script>
@endsection
