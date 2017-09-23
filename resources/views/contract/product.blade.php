<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/basic">
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
                    <input type="text" class="form-control" name="container_size_twenty" value="{{ $shipment->container_size_twenty }}" placeholder="20'">
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="container_size_forty" value="{{ $shipment->container_size_forty }}" placeholder="40'">
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
	   	<table class="table table-bordered">
	   		<thead>
	   			<th>Discharge Port</th>
		   		<th>Product</th>
		   		<th>Package</th>
		   		<th>Specification</th>
		   		<th>Qty.</th>
		   		<th>Rate</th>
		   		<th>Amount</th>	
		   	</thead>
		   	<tbody>
		   	@foreach( $contract_products as $product)
		   		<tr>
		   			<td>
		   				{{ $product->Lodingportdetail->loding_port->name }}, {{ $product->Lodingportdetail->discharge_port->name}}, {{ $product->Lodingportdetail->final_destination->name }}, {{ $product->Lodingportdetail->destination_country->name }}
		   			</td>
		   			<td>{{ $product->product_id }}</td>
		   			<td>{{ $product->package_id }}</td>
		   			<td>{{ $product->specification }}</td>
		   			<td>{{ $product->qty }}</td>
		   			<td>{{ $product->rate }}</td>
		   			<td>{{ $product->amount }}</td>
		   		</tr>
		   	@endforeach
		   	</tbody>
	   	</table>
	   

	</div>
		<div class="card-heading" align="right"><button class="btn btn-primary"><i class=""></i> Update</button></div>
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
});
</script>