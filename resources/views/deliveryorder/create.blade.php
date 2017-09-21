@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Add Delivery Order</b></div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/deliveryorder/create">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Forwarder Name</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="forwarder_id">
                                <option value=""></option>
                                @foreach($forwarders as $forwarder)    
                                <option value="{{ $forwarder->id }}">{{ $forwarder->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shipment Line</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="shipment_line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Freight</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="freight">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Freight</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="total_freight">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">THC</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="thc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">BLC</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="blc" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Booking No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="booking_no" placeholder="">
                        </div>
                    </div><div class="form-group">
                        <label class="col-sm-3 control-label">Booking Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="booking_date" placeholder="">
                        </div>
                    </div><div class="form-group">
                        <label class="col-sm-3 control-label">Booking Expiry Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="booking_expiry_date" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vessel Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="vessel_name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Voyage No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="voyage_no" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ETA Origin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="eta_origin" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ETA Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="eta_date" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Transit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="total_transit" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">VGM Cutoff</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="vgm_cutoff" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Container Gate Open</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="container_gate_open" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gate Cutoff</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="gate_cutoff" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Document Cutoff</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="document_cutoff" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">SI Cutoff</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="si_cutoff" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Stuffing From</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="stuffing_from" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Stuffing To</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="stuffing_to" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Detention Days</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="total_detention_days" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Demurrage Days</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="total_demurrage_days" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Change ETA Destination Port</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="change_eta_destination_port" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Change Total Transit Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="change_total_transit_time" placeholder="">
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
$('.select2').select2();
    $('.datepicker').datepicker({
        todayHighlight:true,
        autoclose:true,
        format:'dd-mm-yyyy',
    });
</script>
@endsection
