<div class="card-body">
	
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/rawmaterial/{{ $shipment_id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<!-- <h4>Sealing & Other Details</h4> -->
	
	<fieldset><legend><h5> <b class="">Container Details :</b></h5></legend><br>
		<div class="form-group row">
			<table class="table table-bordered">
				<thead>
					<th>Sr Np.</th>
					<th>Size</th>
					<th>Container No.</th>
					<th>Self Seal No.</th>
					<th>Line Seal No.</th>
					<th>No. of Pkgs / Flexi No</th>
					<th>Gross Weight (Kgs)</th>
					<th>Net Weight (Kgs)</th>
				</thead>
				<tbody>
				<?php $sr = 1; ?>
				@for( $i=0; $i < $shipment->container_size_twenty; $i++)
					<tr>
						<td>{{ $sr }}</td>
						<td>20 FEET</td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
					</tr>
					@foreach($contract_products as $product)
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>

						<td><input type="text" name="" class="form-control" value="{{ $product->product->name }}" readonly></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
					</tr>
					@endforeach
				<?php $sr++; ?>
				@endfor

				@for( $j=0; $j < $shipment->container_size_forty; $j++)
					<tr>
						<td>{{ $sr+$j }}</td>
						<td>40 FEET</td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
					</tr>
					@foreach($contract_products as $product)
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>

						<td><input type="text" name="" class="form-control" value="{{ $product->product->name }}" readonly></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
						<td><input type="text" name="" class="form-control"></td>
					</tr>
					@endforeach
				@endfor
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"></td>
						<td class="text-right"><b>Total</b></td>
						<td><input type="text" name="" class="form-control" readonly></td>
						<td><input type="text" name="" class="form-control" readonly></td>
						<td><input type="text" name="" class="form-control" readonly></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</fieldset>

	<fieldset><legend><h5><b> Sealing & Other Details :</b></h5></legend><br>
	<div class="form-group row">
		
		<div class="col-md-6">
			
			<div class="form-group row">
                <label class="col-sm-4 form-control-label">Invoice No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="invoice_no" value="{{ $stuffing->invoice_no }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Invoice Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="invoice_date" value="{{ $stuffing->invoice_date }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">ARE No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="are_no" value="{{ $stuffing->are_no }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">ARE Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" name="are_date" value="{{ $stuffing->are_date }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">DBK Rate</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="dbk_rate" value="{{ $stuffing->dbk_rate }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">File No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="file_no" value="{{ $stuffing->file_no }}">
                </div>
            </div>

		</div>

		<div class="col-md-6">
			
			<div class="form-group row">
                <label class="col-sm-4 form-control-label">Freight (Keep 0 If None)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="freight" value="{{ $stuffing->freight }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Extra Charge Name (Keep Blank If None)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="extra_charge_name" value="{{ $stuffing->extra_charge_name }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Extra Charge Amount (Keep 0 If None)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="extra_charge_amount" value="{{ $stuffing->extra_charge_amount }}">
                </div>
            </div>

			<div class="form-group row">
                <label class="col-sm-4 form-control-label">Examining Officer</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="examining_officer" value="{{ $stuffing->examining_officer }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Supervision Officer</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="supervision_officer" value="{{ $stuffing->supervision_officer }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 form-control-label">Examined</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="examined" value="{{ $stuffing->examined }}">
                </div>
            </div>

		</div>

	</div>

	<div class="form-group row">
        <label class="col-sm-2 form-control-label">Container Markings</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" name="container_markings">{{ $stuffing->container_markings }}</textarea>
        </div>
    </div>
    </fieldset>

	<div class="card-heading" align="right"><button class="btn btn-primary"><i class=""></i> Update</button></div>
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