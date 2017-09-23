<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/basic">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<input type="hidden" name="contract_id" value="{{ $contract->id }}">

	<div class="form-group row">
	    <div class="col-md-6">
	        
	        <div class="form-group row">
	            <label class="col-sm-3 form-control-label">Contract No.</label>
	            <div class="col-sm-9">
	                <input type="text" class="form-control" name="contract_no" value="{{ $contract->contract_no }}" required>
	            </div>
	       	</div>
	        
	        <div class="form-group row">
	            <label class="col-sm-3 form-control-label">Contract Date</label>
	            <div class="col-sm-9">
	                <input type="text" class="form-control contract_date" name="contract_date" value="{{ date('d-m-Y',strtotime( $contract->contract_date )) }}" required>
	            </div>
	        </div>
	        
	        <div class="form-group row">
	            <label class="col-sm-3 form-control-label">Surveyor Company</label>
	            <div class="col-sm-9">
	                <select class="form-control select2" name="surveyor_id">
	                    <option value="">Select Any One</option>
	                    @foreach($surveyors as $surveyor)
	                        <option value="{{ $surveyor->id }}" @if($surveyor->id == $contract->surveyor_id) selected @endif>{{ $surveyor->name }}</option>
	                    @endforeach
	                </select>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label class="col-sm-3 form-control-label">Purchase Order No.</label>
	            <div class="col-sm-9">
	                <input type="text" class="form-control contract_date" name="purchase_order_no" value="{{ $contract->purchase_order_no }}">
	            </div>
	        </div>

	        <div class="form-group row">
                <label class="col-sm-3 form-control-label">Buyer's Name</label>
                <div class="col-sm-9">
                    <select class="form-control select2 buyer_id" name="buyer_id" required>
                        <option value="">Select Any One</option>
                        @foreach($buyers as $buyer)
                            <option value="{{ $buyer->id }}" @if($buyer->id == $contract->buyer_id) selected @endif>{{ $buyer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Buyer's Address</label>
                <div class="col-sm-9">
                    <textarea class="form-control buyer_address" rows="3" name="buyer_address" required>{{ $contract->buyer_address }}</textarea>
                </div>
            </div>

	    </div>
	    
	    <div class="col-md-6">

	        <div class="form-group row">
                <label class="col-sm-3 form-control-label">Notifier Party</label>
                <div class="col-sm-9">
                    <textarea class="form-control notifier_party" rows="3" name="notifier_party">{{ $contract->notifier_party }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Consignee Party</label>
                <div class="col-sm-9">
                    <textarea class="form-control consignee_party" rows="3" name="consignee_party">{{ $contract->consignee_party }}</textarea>
                </div>
            </div>

	        <div class="form-group row">
                <label class="col-sm-3 form-control-label">Delivery Terms</label>
                <div class="col-sm-9">
                    <select class="form-control select2" name="delivery_terms_id">
                        <option value="">Select Any One</option>
                        @foreach($delivery_terms as $delivery_term)
                            <option value="{{ $delivery_term->id }}" @if($delivery_term->id == $contract->delivery_terms_id) selected @endif>{{ $delivery_term->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Payment Terms</label>
                <div class="col-sm-9">
                    <select class="form-control select2" name="payment_terms_id">
                        <option value="">Select Any One</option>
                        @foreach($payment_terms as $payment_term)
                            <option value="{{ $payment_term->id }}" @if($payment_term->id == $contract->payment_terms_id) selected @endif>{{ $payment_term->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Dollor Exchange Rate</label>
                <div class="col-sm-4">
                    <input type="number" step="Any" class="form-control" name="dollor_exchange_rate" value="{{ $contract->dollor_exchange_rate }}">
                </div>
                <div class="col-sm-5">
                    <select class="form-control select2" name="dollor_exchange_id">
                        <option value="">Select Any One</option>
                        @foreach($dollor_exchanges as $dollor_exchange)
                            <option value="{{ $dollor_exchange->id }}" @if($dollor_exchange->id == $contract->dollor_exchange_id) selected @endif>{{ $dollor_exchange->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
	        
	   </div>
	</div>
		<div class="card-heading" align="right"><button class="btn btn-primary"><i class=""></i> Save</button></div>
	</form>
</div>

<!-- Jquery -->
<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
    $('.contract_date').datepicker({
        todayHighlight:true,
        autoclose:true,
        format:'dd-mm-yyyy',
    });
});

</script>