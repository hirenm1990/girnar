<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/deliveryorder/{{ $shipment_id }}">
		{{ csrf_field() }}
		<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<input type="hidden" name="contract_id" value="{{ $contract->id }}">
	<div class="form-group row">
	    <div class="col-md-6">
	        
	        <div class="form-group row">
                <label class="col-sm-4 form-control-label">Forwarder Name</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="forwarder_id">
                        <option value="">Select Any One</option>
                       	@foreach( $forwarders as $forwarder )
                            <option value="{{ $forwarder->id }}" @if( $forwarder->id == $do->forwarder_id ) selected @endif>{{ $forwarder->name }}</option>
                       	@endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Freight</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="freight" value="{{ $do->freight }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Total Freight</label>
                <div class="col-sm-8">
                    <input type="number" step="Any" class="form-control" name="total_freight" value="{{ $do->total_freight }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">THC</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="thc" value="{{ $do->thc }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">BLC</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="blc" value="{{ $do->blc }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Shipping Line</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="shipment_line" value="{{ $do->shipment_line }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Booking No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="booking_no" value="{{ $do->booking_no }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Booking Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="booking_date" value="{{ date('d-m-Y',strtotime( $do->booking_date )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Booking Expiry Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="booking_expiry_date" value="{{ date('d-m-Y',strtotime( $do->booking_expiry_date )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Document Cutoff</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="document_cutoff" value="{{ date('d-m-Y',strtotime( $do->document_cutoff )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">SI Cutoff</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="si_cutoff" value="{{ date('d-m-Y',strtotime( $do->si_cutoff )) }}">
                </div>
            </div>

	    </div>
	    <div class="col-md-6">
	    	
	    	<div class="form-group row">
                <label class="col-sm-4 form-control-label">ETA Origin Port</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="eta_origin" value="{{ date('d-m-Y',strtotime( $do->eta_origin )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">ETD Origin Port</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="etd_origin" value="{{ date('d-m-Y',strtotime( $do->etd_origin )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">ETA Destination Port</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="eta_destination" value="{{ date('d-m-Y',strtotime( $do->eta_destination )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">ETA Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="eta_date" value="{{ date('d-m-Y',strtotime( $do->eta_date )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Vessel Name / Voyage No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="vessel_name" value="{{ $do->vessel_name }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Total Transit Time</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="total_transit" value="{{ $do->total_transit }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Total Detention Days</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="total_detention_days" value="{{ $do->total_detention_days }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Total Demurrage Days</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="total_demurrage_days" value="{{ $do->total_demurrage_days }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Change ETA Date Of Destination Port</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="change_eta_destination_port" value="{{ date('d-m-Y',strtotime( $do->change_eta_destination_port )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Change Total Transit Time Of ETA Destination Port</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="change_total_transit_time" value="{{ $do->change_total_transit_time }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Stuffing From Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="stuffing_from" value="{{ date('d-m-Y',strtotime( $do->stuffing_from )) }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Stuffing To Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="stuffing_to" value="{{ date('d-m-Y',strtotime( $do->stuffing_to )) }}">
                </div>
            </div>

	    </div>
	</div>
		<div class="card-heading" align="right"><button class="btn btn-primary"><i class=""></i> Update</button></div>
	</form>
<div>

<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
    $('.datepicker').datepicker({
        todayHighlight:true,
        autoclose:true,
        format:'dd-mm-yyyy',
    });
});
</script>