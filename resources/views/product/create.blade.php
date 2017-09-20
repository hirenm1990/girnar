@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Add Product</b></div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/product/create">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">HS Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" rows="3" name="hs_code" placeholder="" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shortcode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="shortcode">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">DBK Scheme No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dbk_scheme_no" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">FOB</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fob" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">FILE No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="file_no" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary"> Save</button>
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
