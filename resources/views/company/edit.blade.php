@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Update Company</b></div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/company/edit/{{ $company->id }}">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $company->name }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" name="address" placeholder="" required>{{ $company->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone 2</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone2" value="{{ $company->phone2 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Weighbridge Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" name="weighbridge_address" placeholder="" required>{{ $company->weighbridge_address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Weighbridge Reg. No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="weighbridge_reg_no" value="{{ $company->weighbridge_reg_no }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">GST No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="gst_no" value="{{ $company->gst_no }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">IEC No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="iec_no" value="{{ $company->iec_no }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">LUT No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="lut_no" value="{{ $company->lut_no }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PAN No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pan_no" value="{{ $company->pan_no }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Website</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="website" value="{{ $company->website }}" placeholder="">
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
