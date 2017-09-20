@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Add New Contract</b></div>
                <div class="panel-body">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contract No.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="contract_no" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contract Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control contract_date" name="contract_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Surveyor Company</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="surveyor_id">
                                <option value="">Select Any One</option>
                                @foreach($surveyors as $surveyor)
                                    <option value="{{ $surveyor->id }}">{{ $surveyor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buyer</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 buyer_id" name="buyer_id" required>
                                <option value="">Select Any One</option>
                                @foreach($buyers as $buyer)
                                    <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buyer's Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control buyer_name" name="buyer_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buyer's Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control buyer_address" rows="3" name="buyer_address" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Notifier Party</label>
                        <div class="col-sm-9">
                            <textarea class="form-control notifier_party" rows="3" name="notifier_party" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Consignee Party</label>
                        <div class="col-sm-9">
                            <textarea class="form-control consignee_party" rows="3" name="consignee_party" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Delivery Terms</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="delivery_terms_id">
                                <option value="">Select Any One</option>
                                @foreach($delivery_terms as $delivery_term)
                                    <option value="{{ $delivery_term->id }}">{{ $delivery_term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Terms</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="payment_terms_id" placeholder="">
                                <option value="">Select Any One</option>
                                @foreach($payment_terms as $payment_term)
                                    <option value="{{ $payment_term->id }}">{{ $payment_term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dollor Exchange Rate</label>
                        <div class="col-sm-9">
                            <input type="number" step="Any" class="form-control" name="dollor_exchange_rate" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dollor Exchange</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="dollor_exchange_id" placeholder="">
                                <option value="">Select Any One</option>
                                @foreach($dollor_exchanges as $dollor_exchange)
                                    <option value="{{ $dollor_exchange->id }}">{{ $dollor_exchange->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <div class="panel-heading" align="center"><b><h3>Add Shipment Details</h3></b></div>
                <hr>
                <div class="shipment_detail">
                <div class="panel-body remove">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Shipment</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipment[]" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Buyer Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control buyer_name" name="buyer_name_shipment[]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Buyer Address</label>
                            <div class="col-sm-8">
                                <textarea class="form-control buyer_address" rows="3" name="buyer_address_shipment[]" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Shipment Notes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" name="shipment_notes[]" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Loading Port</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="loading_port_id[]" required>
                                    <option value="">Select Any One</option>
                                    @foreach($ports as $port)
                                        <option value="{{ $port->id }}">{{ $port->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Discharge Port</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="discharge_port_id[]" required>
                                    <option value="">Select Any One</option>
                                    @foreach($discharge_ports as $discharge_port)
                                        <option value="{{ $discharge_port->id }}">{{ $discharge_port->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Final Destination</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="final_destination_id[]" required>
                                    <option value="">Select Any One</option>
                                    @foreach($final_destinations as $final_destination)
                                        <option value="{{ $final_destination->id }}">{{ $final_destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Destination Country</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="destination_country_id[]" required>
                                    <option value="">Select Any One</option>
                                    @foreach($countries as $countrie)
                                        <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="panel-heading" align="right"><button type="button" class="btn btn-danger remove_shipment">Remove Shipment</button></div> -->
                    <hr>
                    </div>
                    </div>

                    <div class="panel-heading" align="left"><button type="button" class="btn btn-warning add_more_shipment">Add More Shipment</button></div>
                    <div class="panel-heading" align="right"><button class="btn btn-primary">Save</button></div>
                </form>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
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
        $('.shipment_detail').append('<div class="panel-body remove"><div class="col-md-4"><div class="form-group"><label class="col-sm-4 control-label">Shipment</label><div class="col-sm-8"><input type="text" class="form-control" name="shipment[]" required></div></div><div class="form-group"><label class="col-sm-4 control-label">Buyer Name</label><div class="col-sm-8"><input type="text" class="form-control buyer_name" name="buyer_name_shipment[]"></div></div><div class="form-group"><label class="col-sm-4 control-label">Buyer Address</label><div class="col-sm-8"><textarea class="form-control buyer_address" rows="3" name="buyer_address_shipment[]" required></textarea></div></div></div><div class="col-md-4"><div class="form-group"><label class="col-sm-4 control-label">Shipment Notes</label><div class="col-sm-8"><textarea class="form-control" rows="3" name="shipment_notes[]" required></textarea></div></div><div class="form-group"><label class="col-sm-4 control-label">Loading Port</label><div class="col-sm-8"><select class="form-control select2" name="loading_port_id[]" required><option value="">Select Any One</option> @foreach($ports as $port) <option value="{{ $port->id }}">{{ $port->name }}</option> @endforeach </select></div></div></div><div class="col-md-4"><div class="form-group"><label class="col-sm-4 control-label">Discharge Port</label><div class="col-sm-8"><select class="form-control select2" name="discharge_port_id[]" required><option value="">Select Any One</option> @foreach($discharge_ports as $discharge_port) <option value="{{ $discharge_port->id }}">{{ $discharge_port->name }}</option> @endforeach </select></div></div><div class="form-group"><label class="col-sm-4 control-label">Final Destination</label><div class="col-sm-8"><select class="form-control select2" name="final_destination_id[]" required><option value="">Select Any One</option> @foreach($final_destinations as $final_destination) <option value="{{ $final_destination->id }}">{{ $final_destination->name }}</option> @endforeach </select></div></div><div class="form-group"><label class="col-sm-4 control-label">Destination Country</label><div class="col-sm-8"><select class="form-control select2" name="destination_country_id[]" required><option value="">Select Any One</option> @foreach($countries as $countrie) <option value="{{ $countrie->id }}">{{ $countrie->name }}</option> @endforeach </select></div></div></div><div class="panel-heading" align="right"><button type="button" class="btn btn-danger remove_shipment">Remove Shipment</button></div><hr></div>');
        $('.select2').select2();
    });

    $(document).on('click','.remove_shipment',function(){
        $(this).closest('.remove').remove();
    });


});
</script>
@endsection
