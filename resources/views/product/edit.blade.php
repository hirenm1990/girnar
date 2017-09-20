@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Update Product</b></div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/product/edit/{{ $product->id }}">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">HS Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="hs_code" value="{{ $product->hs_code }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shortcode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="shortcode" value="{{ $product->shortcode }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">DBK Scheme No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dbk_scheme_no" value="{{ $product->dbk_scheme_no }}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">FOB</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fob" value="{{ $product->fob }}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">FILE No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="file_no" value="{{ $product->file_no }}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary"> Update</button>
                        </div>
                    </div>
                </div>
                </form>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
@endsection

@section('jquery')
<script type="text/javascript">
    
</script>
@endsection
