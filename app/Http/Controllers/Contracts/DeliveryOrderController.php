<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect;
use App\Contracts;
use App\Shipments;
use App\Forwarders;
use App\DeliveryOrders;

class DeliveryOrderController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::where( 'id', $shipment_id )->with('deliveryorder')->first();
    	$contract = Contracts::find( $shipment->contract->id );
    	$forwarders = Forwarders::where('isActive',1)->get();
        $do = DeliveryOrders::where('shipment_id',$shipment_id)->first();

        if(!$do) {
            $do = new DeliveryOrders;
            $do->contract_id = $shipment->contract_id;
            $do->shipment_id = $shipment_id;
            $do->save();
        }
        
        return view('contract.deliveryorder',compact('do','shipment_id','shipment','contract','forwarders'));    
        
    }


    public function update( Request $request, $shipment_id )
    {
    	$input = $request->all();

    	$shipment = Shipments::find( $shipment_id );
    	$contract = Contracts::find( $shipment->contract->id );
    	$do_id = DeliveryOrders::where('shipment_id',$shipment_id)->first();	
    	
    	if(!empty($do_id)) {
    		$do = DeliveryOrders::find( $do_id->id );
    	}else{
    		$do = new DeliveryOrders;
    	}
    		$do->contract_id = $contract->id;
    		$do->shipment_id = $shipment_id;
    		$do->forwarder_id = $input['forwarder_id'];	
    		$do->freight = $input['freight'];	
    		$do->total_freight = $input['total_freight'];	
    		$do->thc = $input['thc'];	
    		$do->blc = $input['blc'];	
    		$do->shipment_line = $input['shipment_line'];	
    		$do->booking_no = $input['booking_no'];	
    		$do->booking_date = date('Y-m-d',strtotime($input['booking_date']));	
    		$do->booking_expiry_date = date('Y-m-d',strtotime($input['booking_expiry_date']));	
    		$do->document_cutoff = date('Y-m-d',strtotime($input['document_cutoff']));
    		$do->si_cutoff = date('Y-m-d',strtotime($input['si_cutoff']));
    		$do->eta_origin = date('Y-m-d',strtotime($input['eta_origin']));
    		$do->etd_origin = date('Y-m-d',strtotime($input['etd_origin']));
    		$do->eta_destination = date('Y-m-d',strtotime($input['eta_destination']));
    		$do->eta_date = date('Y-m-d',strtotime($input['eta_date']));
    		$do->vessel_name = $input['vessel_name'];
    		$do->total_transit = $input['total_transit'];
    		$do->total_detention_days = $input['total_detention_days'];
    		$do->total_demurrage_days = $input['total_demurrage_days'];
    		$do->change_eta_destination_port = date('Y-m-d',strtotime($input['change_eta_destination_port']));
    		$do->change_total_transit_time = $input['change_total_transit_time'];
    		$do->stuffing_from = date('Y-m-d',strtotime($input['stuffing_from']));
    		$do->stuffing_to = date('Y-m-d',strtotime($input['stuffing_to']));
    		$do->save();

    	return Redirect('contract/detail/'.$shipment->id.'#delivery-order')->with('message','Delivery Orders Update Successfully.');
    }	
}
