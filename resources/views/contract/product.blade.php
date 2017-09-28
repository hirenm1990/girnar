<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/products/{{ $shipment->id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
	  	<input type="hidden" name="contract_id" value="{{ $shipment->contract->id }}">

	<div class="form-group row">
	    <div class="col-md-6">
	        
	        <div class="form-group row">
                <label class="col-sm-4 form-control-label">Shipment Code</label>
                <div class="col-sm-8">
                    <select class="form-control select2" id="shipment-code" name="shipment_code" required>
                        <option value="A" @if( $shipment->shipment_code == 'A' ) selected @endif>A</option>
                        <option value="B" @if( $shipment->shipment_code == 'B' ) selected @endif>B</option>
                        <option value="C" @if( $shipment->shipment_code == 'C' ) selected @endif>C</option>
                        <option value="D" @if( $shipment->shipment_code == 'D' ) selected @endif>D</option>
                        <option value="E" @if( $shipment->shipment_code == 'E' ) selected @endif>E</option>
                        <option value="F" @if( $shipment->shipment_code == 'F' ) selected @endif>F</option>
                        <option value="G" @if( $shipment->shipment_code == 'G' ) selected @endif>G</option>
                        <option value="H" @if( $shipment->shipment_code == 'H' ) selected @endif>H</option>
                        <option value="I" @if( $shipment->shipment_code == 'I' ) selected @endif>I</option>
                        <option value="J" @if( $shipment->shipment_code == 'J' ) selected @endif>J</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Shipment</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="shipment" value="{{ $shipment->shipment }}">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Container Size</label>
                <div class="col-sm-4">
                    <input type="hidden" name="container_size_twenty" value="{{ $shipment->container_size_twenty }}">
                    <input type="text" class="form-control" name="container_size_twenty" value="{{ $shipment->container_size_twenty }}" placeholder="20'" disabled="disabled">
                </div>
                <div class="col-sm-4">
                    <input type="hidden" name="container_size_forty" value="{{ $shipment->container_size_forty }}">
                    <input type="text" class="form-control" name="container_size_forty" value="{{ $shipment->container_size_forty }}" placeholder="40'" disabled="disabled">
                </div>
            </div>

	    </div>

	    
	    <div class="col-md-6">

	        <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Quotation Freight</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="quotation_freight_twenty" value="{{ $shipment->quotation_freight_twenty }}" placeholder="20'">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="quotation_freight_forty" value="{{ $shipment->quotation_freight_forty }}" placeholder="40'">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Shipment Notes</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="shipment_notes">{{ $shipment->shipment_notes }}</textarea>
                    </div>
                </div>
	   	</div>
	</div>
	<hr>
	<div class="form-group row">
	    	<h5><b>Product List :</b></h5>
	   	<table class="table table-bordered products_table">
	   		<thead>
	   			<th>Discharge Port</th>
		   		<th>Product</th>
		   		<th>Package</th>
		   		<th>Specification</th>
		   		<th>Qty.</th>
		   		<th>Rate</th>
		   		<th>Amount</th>
		   		<th></th>
		   	</thead>
		   	<tbody class="product_group">
		   	@foreach( $contract_products as $product)
		   		<tr class="product_row">
		   			<td>
		   				<select name="discharge_port[]" class="form-control select2" required>
		   					<option value="">Select Any One</option>
		   					@foreach($loding_port_details as $loding_port)
		   						<option value="{{ $loding_port->id }}" @if( $loding_port->id == $product->discharge_port ) selected="selected" @endif>{{ $loding_port->loding_port->name }}, {{ $loding_port->discharge_port->name}}, {{ $loding_port->final_destination->name }}, {{ $loding_port->destination_country->name }}</option>
		   					@endforeach	
		   				</select>
		   			</td>
		   			<td>
		   				<select name="product_id[]" class="form-control select2" required>
		   					<option value="">Select Any One</option>
		   					@foreach($products as $p)
		   						<option value="{{ $p->id }}" @if( $p->id == $product->product_id) selected="selected" @endif>{{ $p->name }}</option>
		   					@endforeach
		   				</select>
		   			</td>
		   			<td>
		   				<select name="package_id[]" class="form-control select2" required>
		   					<option value="">Select Any One</option>
		   					@foreach($packages as $pc)
		   					<option value="{{ $pc->id }}" @if( $pc->id == $product->package_id ) selected="selected" @endif>{{ $pc->name }}</option>
		   					@endforeach
		   				</select>
		   			</td>
		   			<td>
		   				<input type="text" name="specification[]" class="form-control" value="{{ $product->specification }}">
		   			</td>
		   			<td>
		   				<input type="number" step="Any" name="qty[]" class="form-control" value="{{ $product->qty }}">
		   			</td>
		   			<td>
		   				<input type="number" step="Any" name="rate[]" class="form-control" value="{{ $product->rate }}">
		   			</td>
		   			<td>
		   				<input type="number" name="amount[]" class="form-control" value="{{ $product->amount }}" readonly>
		   			</td>
		   			<td>
		   				<button type="button" class="btn btn-danger btn-sm remove_product"><i class="fa fa-close"></i></button>
		   			</td>
		   		</tr>
		   	@endforeach
		   		
		   	</tbody>
		   	<tfoot>
		   		<tr>
		   			<td colspan="8">
		   				<button type="button" class="btn btn-success btn-sm add_product"><i class="fa fa-plus"></i> Add More Product</button>
		   			</td>
		   		</tr>
		   	</tfoot>
	   	</table>
	</div>
		<div class="card-heading" align="right"><button class="btn btn-primary"><i class="fa fa-check"></i> Update</button></div>
	</form>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
    $('.contract_date').datepicker({
        todayHighlight:true,
        autoclose:true,
        format:'dd-mm-yyyy',
    });

    $(document).on('click','.add_product',function(){
    	var html = $('.product_row').html();
    	$('.product_group').append("<tr class='product_row'>"+html+"</tr>" );
    });

    $(document).on('click','.remove_product', function(){
    	$(this).closest('tr').remove();	
    });

    $(document).on("change", ".products_table .product_row input[name='qty[]'], .products_table .product_row input[name='rate[]']", function() {
        var row = $(this).parents(".product_row");
        var quantity = row.find("input[name='qty[]']").val();
        var rate = row.find("input[name='rate[]']").val();
        var total_amount = quantity * rate;
        row.find("input[name='amount[]']").val( total_amount.toFixed(2));
    });


});
</script>