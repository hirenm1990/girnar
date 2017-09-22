@extends('layouts.app')

@section('content')
<!-- 
<nav class="nav nav-tabs" id="myTab" role="tablist">
  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-expanded="true">Home</a>
  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile">Profile</a>
  <div class="dropdown">
    <a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Dropdown
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" id="nav-dropdown1-tab" href="#nav-dropdown1" role="tab" data-toggle="tab" aria-controls="nav-dropdown1">@fat</a>
      <a class="dropdown-item" id="nav-dropdown2-tab" href="#nav-dropdown2" role="tab" data-toggle="tab" aria-controls="nav-dropdown2">@mdo</a>
    </div>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
  <div class="tab-pane fade" id="nav-dropdown1" role="tabpanel" aria-labelledby="nav-dropdown1-tab">...</div>
  <div class="tab-pane fade" id="nav-dropdown2" role="tabpanel" aria-labelledby="nav-dropdown2-tab">...</div>
</div> -->


<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><h3><b>Contract [ {{ $contract->contract_no }} ]</b></h3></div>
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
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/contract/edit/{{ $contract->id }}">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contract No.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="contract_no" value="{{ $contract->contract_no }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contract Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control contract_date" name="contract_date" value="{{ $contract->contract_date }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Surveyor Company</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="surveyor_id">
                                <option value="">Select Any One</option>
                                @foreach($surveyors as $surveyor)
                                    <option value="{{ $surveyor->id }}" @if($surveyor->id == $contract->surveyor_id) selected @endif>{{ $surveyor->name }}</option>
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
                                    <option value="{{ $buyer->id }}" @if($buyer->id == $contract->buyer_id) selected @endif>{{ $buyer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buyer's Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control buyer_name" name="buyer_name" value="{{ $contract->buyer_name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buyer's Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control buyer_address" rows="3" name="buyer_address" required>{{ $contract->buyer_address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Notifier Party</label>
                        <div class="col-sm-9">
                            <textarea class="form-control notifier_party" rows="3" name="notifier_party" placeholder="">{{ $contract->notifier_party }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Consignee Party</label>
                        <div class="col-sm-9">
                            <textarea class="form-control consignee_party" rows="3" name="consignee_party" placeholder="">{{ $contract->consignee_party }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Delivery Terms</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="delivery_terms_id">
                                <option value="">Select Any One</option>
                                @foreach($delivery_terms as $delivery_term)
                                    <option value="{{ $delivery_term->id }}" @if($delivery_term->id == $contract->delivery_terms_id) selected @endif>{{ $delivery_term->name }}</option>
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
                                    <option value="{{ $payment_term->id }}" @if($payment_term->id == $contract->payment_terms_id) selected @endif>{{ $payment_term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dollor Exchange Rate</label>
                        <div class="col-sm-9">
                            <input type="number" step="Any" class="form-control" name="dollor_exchange_rate" value="{{ $contract->id }}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dollor Exchange</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="dollor_exchange_id" placeholder="">
                                <option value="">Select Any One</option>
                                @foreach($dollor_exchanges as $dollor_exchange)
                                    <option value="{{ $dollor_exchange->id }}" @if($dollor_exchange->id == $contract->dollor_exchange_id) selected @endif>{{ $dollor_exchange->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <div class="panel-heading" align="center"><b><h3>Add Shipment Details</h3></b></div>
                <hr>
                <div class="shipment_detail">
                
                @foreach( $shipments as $i => $shipment )
                <div class="panel-body remove">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Shipment</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipment[]" value="{{ $shipment->shipment }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Buyer Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control buyer_name" name="buyer_name_shipment[]" value="{{ $shipment->buyer_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Buyer Address</label>
                            <div class="col-sm-8">
                                <textarea class="form-control buyer_address" rows="3" name="buyer_address_shipment[]" required>{{ $shipment->buyer_address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Shipment Notes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" name="shipment_notes[]" required>{{ $shipment->shipment_notes }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Loading Port</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="loading_port_id[]" required>
                                    <option value="">Select Any One</option>
                                    @foreach($ports as $port)
                                        <option value="{{ $port->id }}" @if( $port->id == $shipment->loading_port_id ) selected @endif>{{ $port->name }}</option>
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
                                        <option value="{{ $discharge_port->id }}" @if( $discharge_port->id == $shipment->discharge_port_id ) selected @endif>{{ $discharge_port->name }}</option>
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
                                        <option value="{{ $final_destination->id }}" @if( $final_destination->id == $shipment->final_destination_id ) selected @endif>{{ $final_destination->name }}</option>
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
                                        <option value="{{ $countrie->id }}" @if( $countrie->id == $shipment->destination_country_id ) selected @endif>{{ $countrie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @if($i != 0)
                    <div class="panel-heading" align="right"><button type="button" class="btn btn-danger remove_shipment">Remove Shipment</button></div>
                    @endif
                    <?php $i++; ?>
                    <hr>
                    </div>
                    @endforeach
                    
                    </div>
                    
                    <div class="panel-heading" align="left"><button type="button" class="btn btn-warning add_more_shipment">Add More Shipment</button></div>
                    <div class="panel-heading" align="right"><button class="btn btn-primary">Update</button></div>
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
