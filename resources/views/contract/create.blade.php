@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header"><b>Add New Contract</b></div>
        <div class="card-body">
        @if (Session()->has('message')) 
          <div class="alert alert-success msg" role="alert">
            {{ Session()->get('message') }}
          </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/create">
        {{ csrf_field() }}
        <div class="form-group row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Contract No.</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="contract_no" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Contract Date</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control contract_date" name="contract_date" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Surveyor Company</label>
                <div class="col-sm-9">
                    <select class="form-control select2" name="surveyor_id">
                        <option value="">Select Any One</option>
                        @foreach($surveyors as $surveyor)
                            <option value="{{ $surveyor->id }}">{{ $surveyor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Purchase Order No.</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="purchase_order_no">
                </div>
                <div class="col-sm-4">
                    <input type="file" name="upload_doc">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Buyer's Name</label>
                <div class="col-sm-9">
                    <select class="form-control select2 buyer_id" name="buyer_id" required>
                        <option value="">Select Any One</option>
                        @foreach($buyers as $buyer)
                            <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- <div class="form-group row"> -->
                <!-- <label class="col-sm-3 form-control-label">Buyer's Name</label> -->
                <!-- <div class="col-sm-9"> -->
                    <input type="hidden" class="form-control buyer_name" name="buyer_name">
                <!-- </div> -->
            <!-- </div> -->
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Buyer's Address</label>
                <div class="col-sm-9">
                    <textarea class="form-control buyer_address" rows="3" name="buyer_address" required></textarea>
                </div>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="checkbox" class="col-sm-3 same_as_notifier_party" id="notifier-party" checked="checked"><span>Same party as Notifier Party</span>
                </div>
            </div>
            <div class="form-group row" style="display:none;" id="notifier-party-address">
                <label class="col-sm-3 form-control-label">Notifier Party</label>
                <div class="col-sm-9">
                    <textarea class="form-control notifier_party" rows="3" name="notifier_party"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="checkbox" class="col-sm-3" id="consignee-party" checked="checked"><span>Same party as Consignee Party</span>
                </div>
            </div>
            <div class="form-group row" style="display:none;" id="consignee-party-address">
                <label class="col-sm-3 form-control-label">Consignee Party</label>
                <div class="col-sm-9">
                    <textarea class="form-control consignee_party" rows="3" name="consignee_party" placeholder=""></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Delivery Terms</label>
                <div class="col-sm-9">
                    <select class="form-control select2" name="delivery_terms_id">
                        <option value="">Select Any One</option>
                        @foreach($delivery_terms as $delivery_term)
                            <option value="{{ $delivery_term->id }}">{{ $delivery_term->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Payment Terms</label>
                <div class="col-sm-9">
                    <select class="form-control select2" name="payment_terms_id" placeholder="">
                        <option value="">Select Any One</option>
                        @foreach($payment_terms as $payment_term)
                            <option value="{{ $payment_term->id }}">{{ $payment_term->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Dollor Exchange Rate</label>
                <div class="col-sm-4">
                    <input type="number" step="Any" class="form-control" name="dollor_exchange_rate" placeholder="">
                </div>
                <div class="col-sm-5">
                    <select class="form-control select2" name="dollor_exchange_id" placeholder="">
                        <option value="">Select Any One</option>
                        @foreach($dollor_exchanges as $dollor_exchange)
                            <option value="{{ $dollor_exchange->id }}">{{ $dollor_exchange->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        </div>
        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="col-sm-12">
            <hr><div class="card-heading" align="center"><b><h3>Add Port And Country</h3></b></div>
        </div>
        <!-- <div class="product_detail"> -->
        <!-- <div class="card-body product_remove"> -->
            <table class="table table-bordered port_table">
                <thead>
                    <th>Loading Port</th>
                    <th>Discharge Port</th>
                    <th>Final Destination</th>
                    <th>Destination Country</th>
                    <th></th>
                </thead>
                <tbody class="port_row">
                    <tr>
                        <td>
                            <select class="form-control select2" name="loading_port_id[]" data-name="" required>
                                <option value="">Select Any One</option>
                                @foreach($ports as $port)
                                    <option value="{{ $port->id }}">{{ $port->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="discharge_port_id[]" required>
                                <option value="">Select Any One</option>
                                @foreach($discharge_ports as $discharge_port)
                                    <option value="{{ $discharge_port->id }}">{{ $discharge_port->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="final_destination_id[]" required>
                                <option value="">Select Any One</option>
                                @foreach($final_destinations as $final_destination)
                                    <option value="{{ $final_destination->id }}">{{ $final_destination->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="destination_country_id[]" required>
                                <option value="">Select Any One</option>
                                @foreach($countries as $countrie)
                                    <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="card-heading" align="left"><button type="button" class="btn btn-warning add-port-row">Add More Port</button></div>
        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="col-sm-12">
            <hr>
            <br><div class="card-heading" align="center"><b><h3>Add Shipment Details</h3></b></div><br>
        </div>
        <hr>
        <div class="shipment_detail">
        <div class="card-body remove">
            <div class="form-group row">
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Shipment Code</label>
                    <div class="col-sm-8">
                        <select class="form-control select2" id="shipment-code" name="shipment_code[]" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Shipment</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="shipment[]" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Container Size</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="container_size_twenty[]" placeholder="20'">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="container_size_forty[]" placeholder="40'">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Quotation Freight</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="quotation_freight_twenty[]" placeholder="20'">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="quotation_freight_forty[]" placeholder="40'">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Shipment Notes</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="shipment_notes[]" required></textarea>
                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="card-heading"><button type="button" class="btn btn-danger remove_shipment">Remove Shipment</button></div>
            </div> -->
            </div>
            </div>

            <div class="card-heading" align="left"><button type="button" class="btn btn-warning add_more_shipment">Add More Shipment</button></div>

            <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="col-sm-12">
            <hr><div class="card-heading" align="center"><b><h3>Add Product</h3></b></div>
        </div>
        <!-- <div class="product_detail"> -->
        <!-- <div class="card-body product_remove"> -->
            <table class="table table-bordered products_table">
                <thead>
                    <th style="width: 5%">Shipment Code</th>
                    <th style="width: 20%">Discharge Port</th>
                    <th style="width: 20%">Product</th>
                    <th style="width: 20%">Package</th>
                    <th style="width: 5%">Specification</th>
                    <th style="width: 10%">Qty</th>
                    <th style="width: 10%">Rate</th>
                    <th style="width: 10%">Amount</th>
                    <th></th>
                </thead>
                <tbody class="product_row">
                    <tr class="product-cal">
                        <td>
                            <select class="form-control select2" id="shipment-code" name="shipment_code_product[]">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2 discharge_port_auto_fillup_opt" name="discharge_port[]">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="product_id[]">
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control select2" name="package_id[]">
                                @foreach($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="specification[]" class="form-control"></td>
                        <td><input type="text" name="qty[]" class="form-control qty"></td>
                        <td><input type="text" name="rate[]" class="form-control rate"></td>
                        <td><input type="text" name="amount[]" class="form-control amount" readonly></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="card-heading" align="left"><button type="button" class="btn btn-warning add-product-row add_more_product">Add More Product</button></div>

            <div class="card-heading" align="right"><button class="btn btn-primary"><i class=""></i> Save</button></div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
    $('.contract_date').datepicker({
        todayHighlight:true,
        autoclose:true,
        format:'dd-mm-yyyy',
    });

    $(document).on("change", "#notifier-party", function() {
        if($(this).prop("checked")) {
            $('#notifier-party-address').hide();
        } else {
            $('#notifier-party-address').show();
        }
    });
    $(document).on("change", "#consignee-party", function() {
        if($(this).prop("checked")) {
            $('#consignee-party-address').hide();
        } else {
            $('#consignee-party-address').show();
        }
    });

    $(document).on('change','.buyer_id',function(){
        var buyer_id = $(this).val();
        $.ajax({
            url:"{{url('/')}}/contract/ajaxgetbuyerdetails",
            type:'GET',
            data:{ 
                "_token": "{{ csrf_token() }}",
                "buyer_id":buyer_id,
            },
            success: function(data){
                $('.buyer_name').val( data['name'] );
                $('.buyer_address').val( data['address'] );
                $('.notifier_party').val( data['address'] );
                $('.consignee_party').val( data['address'] );
            },
        });
    });

    $(document).on('click','.add_more_shipment',function(){
        // var html = $('.shipment_detail').html();
        $('.shipment_detail').append('<div class="card-body remove"><div class="form-group row"><div class="col-md-4"><div class="form-group row"><label class="col-sm-4 form-control-label">Shipment Code</label><div class="col-sm-8"><section class="form-control select2" id="shipment-code" name="shipment_code[]"><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option><option value="F">F</option><option value="G">G</option><option value="H">H</option><option value="I">I</option><option value="J">J</option></section></div></div><div class="form-group row"><label class="col-sm-4 form-control-label">Shipment</label><div class="col-sm-8"><input type="text" class="form-control" name="shipment[]" required></div></div><div class="form-group row"><label class="col-sm-4 form-control-label">Container Size</label><div class="col-sm-4"><input type="text" class="form-control " name="container_size_twenty[]" placeholder="20"></div><div class="col-sm-4"><input type="text" class="form-control " name="container_size_forty[]" placeholder="40"></div></div></div><div class="col-md-4"><div class="form-group row"><label class="col-sm-4 form-control-label">Quotation Freight</label><div class="col-sm-4"><input type="text" class="form-control " name="quotation_freight_twenty[]" placeholder="20"></div><div class="col-sm-4"><input type="text" class="form-control " name="quotation_freight_forty[]" placeholder="40"></div></div><div class="form-group row"><label class="col-sm-4 form-form-control-label">Shipment Notes</label><div class="col-sm-8"><textarea class="form-control" rows="3" name="shipment_notes[]" required></textarea></div></div></div><div class="col-md-4"><div class="card-heading"><button type="button" class="btn btn-danger remove_shipment">Remove Shipment</button></div></div></div></div>');
        $('.select2').select2();
    });

    $(document).on('click','.remove_shipment',function(){
        $(this).closest('.remove').remove();
    });

    $('.add_more_product').on('click',function(){
        $('.product_row').append('<tr class="product-cal"><td><select class="form-control select2" id="shipment-code" name="shipment_code_product[]"><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option><option value="F">F</option><option value="G">G</option><option value="H">H</option><option value="I">I</option><option value="J">J</option></select></td><td><select class="form-control select2 discharge_port_auto_fillup_opt" name="discharge_port[]"><option></option></select></td><td><select class="form-control select2" name="product_id[]"> @foreach($products as $product) <option value="{{ $product->id }}">{{ $product->name }}</option> @endforeach </select></td><td><select class="form-control select2" name="package_id[]"> @foreach($packages as $package) <option value="{{ $package->id }}">{{ $package->name }}</option> @endforeach </select></td><td><input type="text" name="specification[]" class="form-control"></td><td><input type="text" name="qty[]" class="form-control"></td><td><input type="text" name="rate[]" class="form-control"></td><td><input type="text" name="amount[]" class="form-control" readonly></td><td><button type="button" class="btn btn-danger btn-sm product-remove-row"><i class="fa fa-window-close-o"></i></button></td></tr>');
        $('.select2').select2();
        discharge_port_auto_fillup();
    });
    $(document).on("click", ".product-remove-row", function() {
        $(this).parents("tr").remove();
    });

    $('.add-port-row').on('click',function(){
        $('.port_row').append('<tr><td><select class="form-control select2" name="loading_port_id[]" required><option value="">Select Any One</option> @foreach($ports as $port) <option value="{{ $port->id }}">{{ $port->name }}</option> @endforeach </select></td><td><select class="form-control select2" name="discharge_port_id[]" required><option value="">Select Any One</option> @foreach($discharge_ports as $discharge_port) <option value="{{ $discharge_port->id }}">{{ $discharge_port->name }}</option> @endforeach </select></td><td><select class="form-control select2" name="final_destination_id[]" required><option value="">Select Any One</option> @foreach($final_destinations as $final_destination) <option value="{{ $final_destination->id }}">{{ $final_destination->name }}</option> @endforeach </select></td><td><select class="form-control select2" name="destination_country_id[]" required><option value="">Select Any One</option> @foreach($countries as $countrie) <option value="{{ $countrie->id }}">{{ $countrie->name }}</option> @endforeach </select> </td><td><button type="button" class="btn btn-danger btn-sm port-remove-row"><i class="fa fa-window-close-o"></i></button></td></tr>');
        $('.select2').select2();
    });
    
    $(document).on("click", ".port-remove-row", function() {
        $(this).parents("tr").remove();
    });

    $(document).on("change", ".products_table .product-cal input[name='qty[]'], .products_table .product-cal input[name='rate[]']", function() {
        var row = $(this).parents(".product-cal");
        var quantity = row.find("input[name='qty[]']").val();
        var rate = row.find("input[name='rate[]']").val();
        var total_amount = quantity * rate;
        row.find("input[name='amount[]']").val( total_amount.toFixed(2));
    });

    
    $(document).on('change','select[name="loading_port_id[]"]',function(){
        discharge_port_auto_fillup();
    });
    $(document).on('change','select[name="discharge_port_id[]"]',function(){
        discharge_port_auto_fillup();
    });
    $(document).on('change','select[name="final_destination_id[]"]',function(){
        discharge_port_auto_fillup();
    });
    $(document).on('change','select[name="destination_country_id[]"]',function(){
        discharge_port_auto_fillup();
    });

    function discharge_port_auto_fillup(){
        var options = "";
            $.each($('select[name="loading_port_id[]"]'), function(i, v) {
                options += "<option value='" + $('select[name="loading_port_id[]"]').eq(i).val() +","+ 
                    $('select[name="discharge_port_id[]"]').eq(i).val() +"," + $('select[name="final_destination_id[]"]').eq(i).val() +"," + $('select[name="destination_country_id[]"]').eq(i).val() + "' selected='selected'>" + 
                    $('select[name="loading_port_id[]"]').eq(i).val() +","+ 
                    $('select[name="discharge_port_id[]"]').eq(i).val() +"," + 
                    $('select[name="final_destination_id[]"]').eq(i).val() +"," + 
                    $('select[name="destination_country_id[]"]').eq(i).val() +"," + 
                    "</option>";
                });
         $('.discharge_port_auto_fillup_opt').html( options );
    }

    // discharge_port_auto_fillup();

});
</script>
@endsection
