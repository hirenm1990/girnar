<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/vgm/{{ $shipment_id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<div class="form-group row">
	    	
	    	<div class="col-md-6">
	    		
	    		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Name(Authorized)</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="" value="">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Designation(Authorized)</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="" value="">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Contact Detail</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="" value="">
	            	</div>
	       		</div>

	    	</div>
	    	
	    	<div class="col-md-6">

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">Date and time</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="" value="">
	            	</div>
	       		</div>

	       		<div class="form-group row">
	            	<label class="col-sm-3 form-control-label">If Hazardous UN NO.IMDG class</label>
	            	<div class="col-sm-9">
	                	<input type="text" class="form-control" name="" value="">
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
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    			</tr>
	    		</tbody>
	    	</table>
	    </div>

	  	<div class="card-heading" align="right"><button class="btn btn-primary"><i class="fa fa-check"></i> Update</button></div>
	</form>
</div>