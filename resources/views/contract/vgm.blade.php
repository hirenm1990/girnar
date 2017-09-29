<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/vgm/{{ $shipment_id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<div class="form-group row">
	    	
	    	<div class="col-md-6">
	    		
	    		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Name(Authorized)</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="name_authorized" value="{{ $vgm_detail->name_authorized }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Designation(Authorized)</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="designation_authorized" value="{{ $vgm_detail->designation_authorized }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Contact Detail</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="contact_detail" value="{{ $vgm_detail->contact_detail }}">
	            	</div>
	       		</div>

	    	</div>
	    	
	    	<div class="col-md-6">

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Date and time</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control datepicker" name="date_time" value="{{ ($vgm_detail->date_time) ? $vgm_detail->date_time :'' }}">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">If Hazardous UN NO.IMDG class</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="hazardous" value="{{ $vgm_detail->hazardous }}">
	            	</div>
	       		</div>

	    	</div>
	    </div>

	    <div class="form-group row">
	    	<table class="table table-bordered">

	    		<thead>
	    			<th>Sr No.</th>
	    			<th>Size</th>
	    			<th>Container No.</th>
	    			<th>Max Weight(CSC)</th>
	    			<th>Gross Mass</th>
	    			<th>Weighing slip no.</th>
	    			<th>Type</th>
	    			<th>Booking</th>
	    		</thead>
	    		
	    		<tbody>
	    		
	    		@if( $vgm_containers->isEmpty() )
	    			
	    			@if( $container_details->isEmpty() )
	    				<?php $sr = 1; ?>
		    			@for( $i=0; $i < $shipment->container_size_twenty; $i++)
		    				<tr>
			    				<td>{{ $sr }}</td>
			    				<td><input type="hidden" name="container_size[]" value="20 feet">20 feet</td>
			    				<td><input type="text" name="container_no[]" class="form-control" value=""></td>
			    				<td><input type="text" name="max_weight_csc[]" class="form-control" value=""></td>
			    				<td>
			    					<input type="text" name="gross_method[]" class="form-control" value="Method-1">
			    					<input type="text" name="gross_net[]" class="form-control" value="" placeholder="NET">
			    					<input type="text" name="gross_tare[]" class="form-control" value="" placeholder="TARE">
			    					<input type="text" name="gross_packing[]" class="form-control" value="" placeholder="PACKING">
			    				</td>
			    				<td><input type="text" name="weight_slip_no[]" class="form-control" value=""></td>
			    				<td>
			    					<select class="form-control select2" name="type[]">
			    						<option value="">Select Any One</option>
			    						<option value="Normal" selected>Normal</option>
			    						<option value="Reefer">Reefer</option>
			    						<option value="Hazardous">Hazardous</option>
			    						<option value="Other">Other</option>
			    					</select>
			    				</td>
			    				<td><input type="text" name="booking[]" class="form-control" value=""></td>
			    			</tr>
			    		<?php $sr++; ?>
		    			@endfor

		    			@for( $j=0; $j < $shipment->container_size_forty; $j++)
		    				<tr>
			    				<td>{{ $sr + $j }}</td>
			    				<td><input type="hidden" name="container_size[]" value="40 feet">40 feet</td>
			    				<td><input type="text" name="container_no[]" class="form-control" value=""></td>
			    				<td><input type="text" name="max_weight_csc[]" class="form-control" value=""></td>
			    				<td>
			    					<input type="text" name="gross_method[]" class="form-control" value="Method-1">
			    					<input type="text" name="gross_net[]" class="form-control" value="" placeholder="NET">
			    					<input type="text" name="gross_tare[]" class="form-control" value="" placeholder="TARE">
			    					<input type="text" name="gross_packing[]" class="form-control" value="" placeholder="PACKING">
			    				</td>
			    				<td><input type="text" name="weight_slip_no[]" class="form-control" value=""></td>
			    				<td>
			    					<select class="form-control select2" name="type[]">
			    						<option value="">Select Any One</option>
			    						<option value="Normal" selected>Normal</option>
			    						<option value="Reefer">Reefer</option>
			    						<option value="Hazardous">Hazardous</option>
			    						<option value="Other">Other</option>
			    					</select>
			    				</td>
			    				<td><input type="text" name="booking[]" class="form-control" value=""></td>
			    			</tr>
		    			@endfor

	    			@else

		    			<?php $sr = 1; ?>
			    		@foreach( $container_details as $container )
			    		<tr>
			    				<td>{{ $sr }}</td>
			    				<td><input type="hidden" name="container_size[]" value="{{ $container->container_size }}">{{ $container->container_size }}</td>
			    				<td><input type="text" name="container_no[]" class="form-control" value=""></td>
			    				<td><input type="text" name="max_weight_csc[]" class="form-control" value=""></td>
			    				<td>
			    					<input type="text" name="gross_method[]" class="form-control" value="Method-1">
			    					<input type="text" name="gross_net[]" class="form-control" value="" placeholder="NET">
			    					<input type="text" name="gross_tare[]" class="form-control" value="" placeholder="TARE">
			    					<input type="text" name="gross_packing[]" class="form-control" value="" placeholder="PACKING">
			    				</td>
			    				<td><input type="text" name="weight_slip_no[]" class="form-control" value=""></td>
			    				<td>
			    					<select class="form-control select2" name="type[]">
			    						<option value="">Select Any One</option>
			    						<option value="Normal" selected>Normal</option>
			    						<option value="Reefer">Reefer</option>
			    						<option value="Hazardous">Hazardous</option>
			    						<option value="Other">Other</option>
			    					</select>
			    				</td>
			    				<td><input type="text" name="booking[]" class="form-control" value=""></td>
			    			</tr>
			    		<?php $sr++; ?>
			    		@endforeach
			    	@endif
		    	
		    	@else
		    		
		    		<?php $sr = 1; ?>
		    		@foreach( $vgm_containers as $vgm_container )
		    		<tr>
		    				<td>{{ $sr }}</td>
		    				<td><input type="hidden" name="container_size[]" value="{{ $vgm_container->container_size }}">{{ $vgm_container->container_size }}</td>
		    				<td><input type="text" name="container_no[]" class="form-control" value="{{ $vgm_container->container_no }}"></td>
		    				<td><input type="text" name="max_weight_csc[]" class="form-control" value="{{ $vgm_container->max_weight_csc }}"></td>
		    				<td>
		    					<input type="text" name="gross_method[]" class="form-control" value="{{ $vgm_container->gross_method }}">
		    					<input type="text" name="gross_net[]" class="form-control" value="{{ $vgm_container->gross_net }}" placeholder="NET">
		    					<input type="text" name="gross_tare[]" class="form-control" value="{{ $vgm_container->gross_tare }}" placeholder="TARE">
		    					<input type="text" name="gross_packing[]" class="form-control" value="{{ $vgm_container->gross_packing }}" placeholder="PACKING">
		    				</td>
		    				<td><input type="text" name="weight_slip_no[]" class="form-control" value="{{ $vgm_container->weight_slip_no }}"></td>
		    				<td>
		    					<select class="form-control select2" name="type[]">
		    						<option value="">Select Any One</option>
		    						<option value="Normal" @if( $vgm_container->type == 'Normal' ) selected @endif>Normal</option>
		    						<option value="Reefer" @if( $vgm_container->type == 'Reefer' ) selected @endif>Reefer</option>
		    						<option value="Hazardous" @if( $vgm_container->type == 'Hazardous' ) selected @endif>Hazardous</option>
		    						<option value="Other" @if( $vgm_container->type == 'Other' ) selected @endif>Other</option>
		    					</select>
		    				</td>
		    				<td><input type="text" name="booking[]" class="form-control" value="{{ $vgm_container->booking }}"></td>
		    			</tr>
		    		<?php $sr++; ?>
		    		@endforeach

		    	@endif
		    			
	    		</tbody>

	    	</table>
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

    // $('.datetimepicker').datetimepicker();
    
    
});

</script>