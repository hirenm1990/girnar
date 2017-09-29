<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/comminvoice/{{ $shipment_id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<input type="hidden" name="contract_id" value="{{ $contract->id }}">
	  	
	  	<div class="form-group row">
	    	<div class="col-md-6">

	    		<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Manufacturer/ Exporter/ Shipper/ Beneficiary Name</label>
                	<div class="col-sm-9">
                		@if( $comm_invoice->company_name !="" )
                			<input type="text" name="company_name" class="form-control" value="{{ $comm_invoice->company_name }}">
                		@else
                			<input type="text" name="company_name" class="form-control" value="{{ $contract->company->name }}">
                		@endif
                	</div>
            	</div>

	    		<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Manufacturer/ Exporter/ Shipper/ Beneficiary Address</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->company_detail !="" )
                    		<textarea name="company_detail" class="form-control" rows="3">{{ $comm_invoice->company_detail }}</textarea>
                    	@else
                    		<textarea name="company_detail" class="form-control" rows="3">{{ $contract->company->address }}</textarea>
                    	@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Beneficiary Bank Name</label>
                	<div class="col-sm-9">
                		@if( $comm_invoice->bank_name !="" )
                			<input type="text" name="bank_name" class="form-control" value="{{ $comm_invoice->bank_name }}">
                		@else
                			<input type="text" name="bank_name" class="form-control" value="{{ $contract->bank->name }}">
                		@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Beneficiary Bank Details</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->bank_detail !="" )
                    		<textarea name="bank_detail" class="form-control" rows="3">{{ $comm_invoice->bank_detail }}</textarea>
                    	@else
                    		<textarea name="bank_detail" class="form-control" rows="3">{{ $contract->bank->address }}</textarea>
                    	@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Buyer's Name</label>
                	<div class="col-sm-9">
                		@if( $comm_invoice->buyer_name !="" )
                			<input type="text" name="buyer_name" class="form-control" value="{{ $comm_invoice->buyer_name }}">
                		@else
                			<input type="text" name="buyer_name" class="form-control" value="{{ $contract->buyer->name }}">
                		@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Buyer's Address</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->buyer_address !="" )
                    		<textarea name="buyer_address" class="form-control" rows="3">{{ $comm_invoice->buyer_address }}</textarea>
                    	@else
                    		<textarea name="buyer_address" class="form-control" rows="3">{{ $contract->buyer->address }}</textarea>
                    	@endif
                	</div>
            	</div>

            	<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Buyer Bank Name</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="buyer_bank_name" value="{{ $comm_invoice->buyer_bank_name }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Buyer Bank Details</label>
                	<div class="col-sm-9">
                    	<textarea class="form-control" rows="3" name="buyer_bank_details">{{ $comm_invoice->buyer_bank_details }}</textarea>
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Notify Party</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->notify_party !="" )
                    		<textarea class="form-control" rows="3" name="notify_party">{{ $comm_invoice->notify_party }}</textarea>
                    	@else
                    		<textarea class="form-control" rows="3" name="notify_party">{{ $contract->notifier_party }}</textarea>
                    	@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Buyer Bank :(Consignee)</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->consignee_party !="" )
                    		<textarea class="form-control" rows="3" name="consignee_party">{{ $comm_invoice->consignee_party }}</textarea>
                    	@else
                    		<textarea class="form-control" rows="3" name="consignee_party">{{ $contract->consignee_party }}</textarea>
                    	@endif
                	</div>
            	</div>

	    	</div>

	    	<div class="col-md-6">

	    		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Comm. Invoice No.</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="comm_invoice_no" value="{{ $comm_invoice->comm_invoice_no }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Comm. Invoice Date</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control datepicker" name="comm_invoice_date" value="{{ ($comm_invoice->comm_invoice_date) ? date('d-m-Y',strtotime( $comm_invoice->comm_invoice_date )) :'' }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">LC No.</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="lc_no" value="{{ $comm_invoice->lc_no }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">LC Date</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control datepicker" name="lc_date" value="{{ ($comm_invoice->lc_date) ? date('d-m-Y',strtotime( $comm_invoice->lc_date )) :''}}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">BL No.</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="bl_no" value="{{ $comm_invoice->bl_no }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">BL Date</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control datepicker" name="bl_date" value="{{ ($comm_invoice->bl_date) ? date('d-m-Y',strtotime( $comm_invoice->bl_date )) :'' }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Vessel/ Voy. No./Flight No.</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="vessel_no" value="{{ $comm_invoice->vessel_no }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Loding Port Detail</label>
	            	<div class="col-sm-9">
	                	<select class="form-control select2" name="loding_port_detail_id">
                        	<option value="">Select Any One</option>
                        	@foreach($loding_port_details as $loding_port)
		   						<option value="{{ $loding_port->id }}" @if( $loding_port->id == $loding_port_detail_id ) selected @endif>{{ $loding_port->loding_port->name }}, {{ $loding_port->discharge_port->name}}, {{ $loding_port->final_destination->name }}, {{ $loding_port->destination_country->name }}</option>
		   					@endforeach	
                    	</select>
	            	</div>
	       		</div>

	       		<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Country Of Origin (Will Be Displayed Under Description Of Goods)</label>
                	<div class="col-sm-9">
                    	<textarea class="form-control" rows="3" name="country_of_origin">{{ $comm_invoice->country_of_origin }}</textarea>
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Country of Final Destination</label>
                	<div class="col-sm-9">
                    	<select class="form-control select2" name="country_of_final_destination">
                        	<option value="">Select Any One</option>
                        	@foreach($countries as $country)
                            	<option value="{{ $country->id }}">{{ $country->name }}</option>
                        	@endforeach
                    	</select>
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Terms of Delivery</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->terms_of_delivery !="" )
	                    	<select class="form-control select2" name="terms_of_delivery">
	                        	<option value="">Select Any One</option>
	                        	@foreach($delivery_terms as $delivery_term)
	                            	<option value="{{ $delivery_term->id }}" @if( $delivery_term->id == $comm_invoice->terms_of_delivery ) selected @endif>{{ $delivery_term->name }}</option>
	                        	@endforeach
	                    	</select>
                    	@else
	                    	<select class="form-control select2" name="terms_of_delivery">
	                        	<option value="">Select Any One</option>
	                        	@foreach($delivery_terms as $delivery_term)
	                            	<option value="{{ $delivery_term->id }}" @if( $delivery_term->id == $contract->delivery_terms_id ) selected @endif>{{ $delivery_term->name }}</option>
	                        	@endforeach
	                    	</select>
                    	@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Terms of Payment</label>
                	<div class="col-sm-9">
                    	@if( $comm_invoice->terms_of_payment !="" )
	                    	<select class="form-control select2" name="terms_of_payment">
	                        	<option value="">Select Any One</option>
	                        	@foreach($payment_terms as $payment_term)
	                            	<option value="{{ $payment_term->id }}" @if( $payment_term->id == $comm_invoice->terms_of_payment ) selected @endif>{{ $payment_term->name }}</option>
	                        	@endforeach
	                    	</select>
                    	@else
	                    	<select class="form-control select2" name="terms_of_payment">
	                        	<option value="">Select Any One</option>
	                        	@foreach($payment_terms as $payment_term)
	                            	<option value="{{ $payment_term->id }}" @if( $payment_term->id == $contract->payment_terms_id ) selected @endif>{{ $payment_term->name }}</option>
	                        	@endforeach
	                    	</select>
                    	@endif
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Drawn Under</label>
                	<div class="col-sm-9">
                    	<textarea class="form-control" rows="3" name="drawn_under">{{ $comm_invoice->drawn_under }}</textarea>
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Specification</label>
                	<div class="col-sm-9">
                    	<textarea class="form-control" rows="3" name="specification">{{ $comm_invoice->specification }}</textarea>
                	</div>
            	</div>

            	<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Comm. Invoice Notes (Will Be Displayed Under Container Markings)</label>
                	<div class="col-sm-9">
                    	<textarea class="form-control" rows="3" name="comm_invoice_notes">{{ $comm_invoice->comm_invoice_notes }}</textarea>
                	</div>
            	</div>

            	<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Document Ready On</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control datepicker" name="document_ready_on" value="">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Document Status</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="document_status" value="">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Comm. Invoice Discount</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="comm_invoice_discount" value="{{ $comm_invoice->comm_invoice_discount }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">ETA Date</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control datepicker" name="eta_date" value="{{ ($comm_invoice->eta_date) ? date('d-m-Y',strtotime( $comm_invoice->eta_date )) :'' }}">
	            	</div>
	       		</div>

	    	</div>
	    </div>

	  	<div class="card-heading" align="right"><button class="btn btn-primary"><i class="fa fa-check"></i> Update</button></div>
	</form>
</div>

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