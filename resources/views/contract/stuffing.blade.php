<div class="card-body">
	
	<form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/stuffing/{{ $shipment_id }}">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="shipment_id" value="{{ $shipment_id }}">
	  	<!-- <h4>Sealing & Other Details</h4> -->
	
	<fieldset><legend><h5> <b class="">Container Details :</b></h5></legend><br>
		<div class="form-group row">

			<label>
                <input type="checkbox" name="flexitank" class="flexiTankToggle" value="true"> <strong>Use Flexitank No. Instead Of No. Of Packages?</strong>
                <div class="fake"></div>
            </label>

			<table class="table table-bordered">
				<thead>
					<th>Sr No.</th>
					<th>Size</th>
					<th>Container No.</th>
					<th>Self Seal No.</th>
					<th>Line Seal No.</th>
					<th>No. of Pkgs / Flexi No</th>
					<th>Gross Weight (Kgs)</th>
					<th>Net Weight (Kgs)</th>
				</thead>
				@if( $container_details->isEmpty() )
					
					<input type="hidden" name="container_detail_flag" value="0">
					<tbody>
					<?php $sr = 1; ?>
					
					@for( $i=0; $i < $shipment->container_size_twenty; $i++)
						<tr>
							<input type="hidden" name="container_detail_id_tw[]" value="0">
							<td>{{ $sr }}
								<a href="{{ URL::to('/') }}/contract/ConatainerRemoveByShipmentTw/{{ $shipment_id }}" class="btn btn-danger btn-sm removeConatainer"><i class="fa fa-close"></i></a>
							</td>
							<td><input type="hidden" name="container_size_tw[]" value="20 feet"> 20 FEET</td>
							<td><input type="text" name="container_no_tw[]" class="form-control"></td>
							<td><input type="text" name="self_seal_no_tw[]" class="form-control"></td>
							<td><input type="text" name="line_seal_no_tw[]" class="form-control"></td>
							
							<td><input type="text" name="flexi_no_pkgs_tw[]" class="form-control container_flexi_no container_flexi{{ $sr }}" readonly></td>
							<td><input type="text" name="gross_weight_tw[]" class="form-control container_gross_weight container_gross{{ $sr }}" readonly></td>
							<td><input type="text" name="net_weight_tw[]" class="form-control container_net_weight container_net{{ $sr }}" readonly></td>
							
						</tr>
						@foreach($contract_products as $product)
						<tr>
							<input type="hidden" name="container_product_id_tw[]" value="0">
							<td></td>
							<td></td>
							<td></td>
							<td></td>

							<td><input type="hidden" name="product_id_tw[]" value="{{ $product->product->id }}">
								<input type="text" name="product_name_tw[]" class="form-control" value="{{ $product->product->name }}" readonly></td>
							
							<td><input type="text" name="product_flexi_no_pkgs_tw[]" data-container="{{ $sr }}" class="form-control product_flexi{{ $sr }}"></td>
							<td><input type="text" name="product_gross_weight_tw[]" data-container="{{ $sr }}" class="form-control product_gross{{ $sr }}"></td>
							<td><input type="text" name="product_net_weight_tw[]" data-container="{{ $sr }}" class="form-control product_net{{ $sr }}"></td>
							
						</tr>
						@endforeach
					<?php $sr++; ?>
					@endfor

					@for( $j=0; $j < $shipment->container_size_forty; $j++)
						<tr>
							<input type="hidden" name="container_detail_id_ft[]" value="0">
							<td>{{ $sr + $j }}
								<a href="{{ URL::to('/') }}/contract/ConatainerRemoveByShipmentFt/{{ $shipment_id }}" class="btn btn-danger btn-sm removeConatainer"><i class="fa fa-close"></i></a>
							</td>
							<td><input type="hidden" name="container_size_ft[]" value="40 feet"> 40 FEET</td>
							<td><input type="text" name="container_no_ft[]" class="form-control"></td>
							<td><input type="text" name="self_seal_no_ft[]" class="form-control"></td>
							<td><input type="text" name="line_seal_no_ft[]" class="form-control"></td>
							<td><input type="text" name="flexi_no_pkgs_ft[]" class="form-control container_flexi_no container_flexi{{ $sr + $j }}" readonly></td>
							<td><input type="text" name="gross_weight_ft[]" class="form-control container_gross_weight container_gross{{ $sr + $j }}" readonly></td>
							<td><input type="text" name="net_weight_ft[]" class="form-control container_net_weight container_net{{ $sr + $j }}" readonly></td>
						</tr>
						@foreach($contract_products as $product)
						<tr>
							<input type="hidden" name="container_product_id_ft[]" value="0">
							<td></td>
							<td></td>
							<td></td>
							<td></td>

							<td><input type="hidden" name="product_id_ft[]" value="{{ $product->product->id }}">
								<input type="text" name="product_name_ft[]" class="form-control" value="{{ $product->product->name }}" readonly></td>
							
							<td><input type="text" name="product_flexi_no_pkgs_ft[]" data-container="{{ $sr + $j }}" class="form-control product_flexi{{ $sr + $j }}"></td>
							<td><input type="text" name="product_gross_weight_ft[]" data-container="{{ $sr + $j }}" class="form-control product_gross{{ $sr + $j }}"></td>
							<td><input type="text" name="product_net_weight_ft[]" data-container="{{ $sr + $j }}" class="form-control product_net{{ $sr + $j }}"></td>
						</tr>
						@endforeach
					@endfor
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4"></td>
							<td class="text-right"><b>Total</b></td>
							<td><input type="text" name="flexi_no_pkgs_total" class="form-control flexi_no_pkgs_total" readonly></td>
							<td><input type="text" name="gross_weight_total" class="form-control gross_weight_total" readonly></td>
							<td><input type="text" name="net_weight_total" class="form-control net_weight_total" readonly></td>
						</tr>
						
					</tfoot>

				@else

					<input type="hidden" name="container_detail_flag" value="1">
					<tbody>
					<?php $sr = 1; $net_weight = 0; $gross_weight = 0; $flexi_no_pkgs = 0; $flexi_no_pkgs_total = 0; $gross_weight_total = 0; $net_weight_total = 0; ?>
					@foreach($container_details as $container_detail)
						<tr>
							<input type="hidden" name="container_detail_id[]" value="{{ $container_detail->id }}">
							<td>{{ $sr }}
								<a href="{{ URL::to('/') }}/contract/stuffingConatainerRemove/{{ $container_detail->id }}" class="btn btn-danger btn-sm removeConatainer"><i class="fa fa-close"></i></a>
							</td>
							<td><input type="hidden" name="container_size[]" value="{{ $container_detail->container_size }}">{{ $container_detail->container_size }}</td>
							<td><input type="text" name="container_no[]" class="form-control" value="{{ $container_detail->container_no }}"></td>
							<td><input type="text" name="self_seal_no[]" class="form-control" value="{{ $container_detail->self_seal_no }}"></td>
							<td><input type="text" name="line_seal_no[]" class="form-control" value="{{ $container_detail->line_seal_no }}"></td>

							<td><input type="text" name="flexi_no_pkgs[]" class="form-control container_flexi_no container_flexi{{ $sr }}" value="{{ $container_detail->flexi_no_pkgs }}" readonly></td>
							<td><input type="text" name="gross_weight[]" class="form-control container_gross_weight container_gross{{ $sr }}" value="{{ $container_detail->gross_weight }}" readonly></td>
							<td><input type="text" name="net_weight[]" class="form-control container_net_weight container_net{{ $sr }}"value="{{ $container_detail->net_weight }}" readonly></td>
						</tr>

						@foreach($container_products as $container_product)
							@if($container_detail->id == $container_product->containers_detail_id)
							<tr>
								<input type="hidden" name="container_product_id[]" value="{{ $container_product->id }}">
								<td></td>
								<td></td>
								<td></td>
								<td></td>

								<td><input type="hidden" name="product_id[]" value="{{ $container_product->product_id }}">
									<input type="text" name="product_name[]" class="form-control" value="{{ $container_product->product_name }}" readonly></td>

								<td><input type="text" name="product_flexi_no_pkgs[]" data-container="{{ $sr }}" class="form-control product_flexi{{ $sr }}" value="{{ $container_product->product_flexi_no_pkgs }}"></td> <?php $flexi_no_pkgs += $container_product->product_flexi_no_pkgs; ?>
								<td><input type="text" name="product_gross_weight[]" data-container="{{ $sr }}" class="form-control product_gross{{ $sr }}" value="{{ $container_product->product_gross_weight }}"></td> <?php $gross_weight += $container_product->product_gross_weight; ?>
								<td><input type="text" name="product_net_weight[]" data-container="{{ $sr }}" class="form-control product_net{{ $sr }}" value="{{ $container_product->product_net_weight }}"></td> <?php $net_weight += $container_product->product_net_weight; ?>
							</tr>
							<?php $flexi_no_pkgs_total += $container_product->product_flexi_no_pkgs; ?>
							@endif
						@endforeach
					<?php $sr++; ?>
					@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">
								@if( !$container_details->isEmpty() )
									<a href="{{ URL::to('/') }}/contract/stuffingAddTWContainer/{{ $shipment_id }}" class="btn btn-success btn-sm show_container_tw"><i class="fa fa-plus"></i> Add 20' Container</a>&nbsp;
									<a href="{{ URL::to('/') }}/contract/stuffingAddFTContainer/{{ $shipment_id }}" class="btn btn-success btn-sm show_container_ft"><i class="fa fa-plus"></i> Add 40' Container</a>
								@endif
							</td>
							<td class="text-right"><b>Total</b></td>
							<td><input type="text" name="flexi_no_pkgs_total" class="form-control flexi_no_pkgs_total" value="{{ $flexi_no_pkgs_total }}" readonly></td>
							<td><input type="text" name="gross_weight_total" class="form-control gross_weight_total" readonly></td>
							<td><input type="text" name="net_weight_total" class="form-control net_weight_total" readonly></td>
						</tr>
						<!-- <tr>
							<td colspan="7">
								<button type="button" class="btn btn-success btn-sm">Add Container 20'</button>
								<button type="button" class="btn btn-success btn-sm">Add Container 40'</button>
							</td>
						</tr> -->
					</tfoot>
				@endif
				
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
                    <input type="text" class="form-control datepicker" name="invoice_date" value="{{ ($stuffing->invoice_date) ? date('d-m-Y',strtotime($stuffing->invoice_date)) :'' }}">
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
                    <input type="text" class="form-control datepicker" name="are_date" value="{{ ($stuffing->are_date) ? date('d-m-Y',strtotime($stuffing->are_date)) :'' }}">
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
    
    <hr>

    <fieldset><legend><h5><b><input type="checkbox" name="multiple_invoice" class="multipleInvoiceToggle" value="true"> Multiple Invoice?</b></h5></legend>
    	<div class="form-group row multipleInvoiceTable" style="display: none;">
		<table class="table table-bordered">
			<thead>
				
				<th>Invoice No.</th>
				<th>Invoice Date</th>
				<th>No. Of 20' Containers</th>
				<th>No. Of 40' Containers</th>
				<th></th>
					
			</thead>
			<tbody class="multi_invoice_group">
				
				<tr class="multi_invoice_row">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><button type="button" class="btn btn-danger btn-sm remove_invoice_row"><i class="fa fa-close"></i></button></td>
				</tr>

			</tbody>
			<tfoot>
				<tr>
					<td><button type="button" class="btn btn-success btn-sm add_more_invoice"><i class="fa fa-plus"></i> Add More Invoice</button></td>
				</tr>
			</tfoot>
		</table>
		</div>
    </fieldset>

    <hr>
    
    <fieldset><legend><b><h4></h4></b></legend>
    	<div class="form-group row">
    		<div class="col-md-6">
    			<div class="form-group row">
                	<label class="col-sm-4 form-control-label">Buyer / Importer Address</label>
                	<div class="col-sm-8">
                    	<textarea class="form-control" rows="3" name="buyer_address">{{ $contract->buyer_address }}</textarea>
                	</div>
            	</div>
    		</div>
    		<div class="col-md-6">
    			<div class="form-group row">
                	<label class="col-sm-3 form-control-label">Notify Party</label>
                	<div class="col-sm-9">
                    	<textarea class="form-control" rows="3" name="notifier_party">{{ $contract->notifier_party }}</textarea>
                	</div>
            	</div>
    		</div>
    	</div>
    </fieldset>

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

    $(document).on('click','.add_more_invoice', function () {
    	var html = $('.multi_invoice_row').html();
    	$('.multi_invoice_group').append("<tr>"+html+"</tr>");
    });

    $(document).on('click','.remove_invoice_row',function () {
    	$(this).closest('tr').remove();
    });

    $(document).on("change", ".multipleInvoiceToggle", function () {
        if( $(this).prop('checked') ) {
            $('.multipleInvoiceTable').show();
        } else {
            $('.multipleInvoiceTable').hide();
        }
    });

    $(document).on('click','.removeConatainer',function(e){
  		e.preventDefault();

  		if(confirm("Are You Sure You Want To Delete This Container ? ")){
    		var linkUrl = $(this).attr('href');
    		window.location.href = linkUrl;
  		}else{
    		return false;
 		}
	});

    // Container Table Cal
    function container_calculation() {

    	var flexi_no_pkg = 0;
    	var package_type = "";
    	
    	$.each( $('.container_flexi_no'), function ( i ) {
    		
    		var flexi_val = $(this).val();
    		console.log( flexi_val );
    		if(parseFloat( flexi_val ) > 0) {
                flexi_no_pkg += parseFloat( flexi_val );

            	var me = flexi_val;
                var type = me.split(' ')[1];

                if(package_type == "" && type != "") {
                    package_type = type;
                } else if( package_type != type ) {
                    package_type = "Packages";
                }
            }
    	});
    	
    	$('.flexi_no_pkgs_total').val( flexi_no_pkg + " " + package_type );


    	var gross_weight = 0;
    	$.each( $('.container_gross_weight'), function ( i ) {
    		if($(this).val() > 0)
                gross_weight += parseFloat($(this).val());
    	});
    	$('.gross_weight_total').val( gross_weight );


    	var net_weight = 0;
    	$.each( $('.container_net_weight'), function ( i ) {
    		if($(this).val() > 0)
                net_weight += parseFloat($(this).val());
    	});
    	$('.net_weight_total').val( net_weight );
    };

    $(document).on('keyup','input[name="product_flexi_no_pkgs[]"]', function () {
    	
    	// console.log("sadhkjasdhjsakdhksjadhkjsadhakjsd");
    	var flexi = $(".flexiTankToggle").prop("checked");
    	if(flexi == true) {
            var c = $(this).data("container");
            $(".container_flexi" + c ).val( $(this).val() );
            return false;
        }

        var c = $(this).data("container"); 
        // console.log( c );
    	var total = 0;
    	var package_type = "";

    	$.each( $('.product_flexi' + c ), function (i) {
    		if($(this).val()) {
                total += parseFloat($(this).val());

                var me = $(this).val();
                var type = me.split(' ')[1];

                if(package_type == "" && type != "") {
                    package_type = type;
                } else if( package_type != type ) {
                    package_type = "Packages";
                }
            }
    	});

    	if(!package_type) {
            package_type = "Packages";
        }

    	$('.container_flexi' + c ).val( total + " " + package_type );

    	container_calculation();
    });

    $(document).on('keyup','input[name="product_flexi_no_pkgs_tw[]"]', function () {
    	
    	var flexi = $(".flexiTankToggle").prop("checked");
    	if(flexi == true) {
            var c = $(this).data("container");
            $(".container_flexi" + c ).val( $(this).val() );
            return false;
        }

        var c = $(this).data("container"); 
        // console.log( c );
    	var total = 0;
    	var package_type = "";

    	$.each( $('.product_flexi' + c ), function (i) {
    		if($(this).val()) {
                total += parseFloat($(this).val());

                var me = $(this).val();
                var type = me.split(' ')[1];

                if(package_type == "" && type != "") {
                    package_type = type;
                } else if( package_type != type ) {
                    package_type = "Packages";
                }
            }
    	});

    	if(!package_type) {
            package_type = "Packages";
        }

    	$('.container_flexi' + c ).val( total + " " + package_type );

    	container_calculation();
    });

    $(document).on('keyup','input[name="product_flexi_no_pkgs_ft[]"]', function () {
    	
    	var flexi = $(".flexiTankToggle").prop("checked");
    	if(flexi == true) {
            var c = $(this).data("container");
            $(".container_flexi" + c ).val( $(this).val() );
            return false;
        }

        var c = $(this).data("container"); 
        // console.log( c );
    	var total = 0;
    	var package_type = "";

    	$.each( $('.product_flexi' + c ), function (i) {
    		if($(this).val()) {
                total += parseFloat($(this).val());

                var me = $(this).val();
                var type = me.split(' ')[1];

                if(package_type == "" && type != "") {
                    package_type = type;
                } else if( package_type != type ) {
                    package_type = "Packages";
                }
            }
    	});

    	if(!package_type) {
            package_type = "Packages";
        }

    	$('.container_flexi' + c ).val( total + " " + package_type );

    	container_calculation();
    });

    $(document).on('keyup','input[name="product_gross_weight[]"]', function () {
    	
    	var c = $(this).data("container");
        var total = 0;
        $.each( $(".product_gross" + c ), function(i) {
            if($(this).val()) {
                total += parseFloat($(this).val());
            }
        });

        $(".container_gross" + c ).val( total );

        container_calculation();

    });

    $(document).on('keyup','input[name="product_gross_weight_tw[]"]', function () {
    	
    	var c = $(this).data("container");
        var total = 0;
        $.each( $(".product_gross" + c ), function(i) {
            if($(this).val()) {
                total += parseFloat($(this).val());
            }
        });

        $(".container_gross" + c ).val( total );

        container_calculation();

    });

    $(document).on('keyup','input[name="product_gross_weight_ft[]"]', function () {
    	
    	var c = $(this).data("container");
        var total = 0;
        $.each( $(".product_gross" + c ), function(i) {
            if($(this).val()) {
                total += parseFloat($(this).val());
            }
        });

        $(".container_gross" + c ).val( total );

        container_calculation();

    });

    $(document).on('keyup','input[name="product_net_weight[]"]', function () {

    	var c = $(this).data("container");
    	var total = 0;
    	$.each( $(".product_net" + c ), function () {
    		if($(this).val()) {
    			total += parseFloat($(this).val());
    		}
    	});

    	$(".container_net" + c ).val( total );

    	container_calculation();
    });

    $(document).on('keyup','input[name="product_net_weight_tw[]"]', function () {

    	var c = $(this).data("container");
    	var total = 0;
    	$.each( $(".product_net" + c ), function () {
    		if($(this).val()) {
    			total += parseFloat($(this).val());
    		}
    	});

    	$(".container_net" + c ).val( total );

    	container_calculation();
    });

    $(document).on('keyup','input[name="product_net_weight_ft[]"]', function () {

    	var c = $(this).data("container");
    	var total = 0;
    	$.each( $(".product_net" + c ), function () {
    		if($(this).val()) {
    			total += parseFloat($(this).val());
    		}
    	});

    	$(".container_net" + c ).val( total );

    	container_calculation();
    });

    container_calculation();

});

</script>