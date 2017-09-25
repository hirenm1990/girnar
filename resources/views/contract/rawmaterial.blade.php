<div class="card-body">
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/rawmaterial/{{ $shipment_id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<div class="card-heading" align="right"><button class="btn btn-primary"><i class=""></i> Update</button></div>
	</form>
</div>