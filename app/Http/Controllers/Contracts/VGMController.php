<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContainerDetails;
use App\Shipments;
use App\Contracts;
use App\VGMDetails;
use App\VGMContainers;

class VGMController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::find( $shipment_id );
		$contract = Contracts::find( $shipment->contract->id );
    	$container_details = ContainerDetails::where( 'shipment_id', $shipment_id )->get();
    	$vgm_detail = VGMDetails::where( 'shipment_id',$shipment_id )->first();

    	if( !$vgm_detail ) {
    		
    		$vgm_detail = new VGMDetails;
    		$vgm_detail->contract_id = $contract->id;
    		$vgm_detail->shipment_id = $shipment_id;
    		$vgm_detail->save();
    	}

    	$vgm_containers = VGMContainers::where( 'vgm_detail_id', $vgm_detail->id )->get();

    	return view('contract.vgm',compact('vgm_detail','vgm_containers','container_details','shipment_id','shipment','contract'));
    }


    public function update(Request $request, $shipment_id )
    {
    	$input = $request->all();

    	$shipment = Shipments::find( $shipment_id );
		$contract = Contracts::find( $shipment->contract->id );

    	$vgm = VGMDetails::find( $shipment->vgm->id );
    	$vgm->contract_id = $contract->id;
    	$vgm->shipment_id = $shipment_id;
    	$vgm->name_authorized = $input['name_authorized'];
    	$vgm->designation_authorized = $input['designation_authorized'];
    	$vgm->contact_detail = $input['contact_detail'];
    	( $input['date_time'] !="" ) ? $vgm->date_time = date('Y-m-d',strtotime( $input['date_time'] )) :"NULL";
    	$vgm->hazardous = $input['hazardous'];
    	$vgm->save();

    	VGMContainers::where('vgm_detail_id', $vgm->id)->delete();
    	foreach ( $input['container_no'] as $key => $value) {

    		$vgm_container = new VGMContainers;
    		$vgm_container->contract_id = $contract->id;
    		$vgm_container->shipment_id = $shipment_id;
    		$vgm_container->vgm_detail_id = $vgm->id;
    		$vgm_container->container_size = $input['container_size'][$key];
    		$vgm_container->container_no = $input['container_no'][$key];
    		$vgm_container->max_weight_csc = $input['max_weight_csc'][$key];
    		$vgm_container->gross_method = $input['gross_method'][$key];
    		$vgm_container->gross_net = $input['gross_net'][$key];
    		$vgm_container->gross_tare = $input['gross_tare'][$key];
    		$vgm_container->gross_packing = $input['gross_packing'][$key];
    		$vgm_container->weight_slip_no = $input['weight_slip_no'][$key];
    		$vgm_container->type = $input['type'][$key];
    		$vgm_container->booking = $input['booking'][$key];
    		$vgm_container->save();
    	}

    	return Redirect('contract/detail/'.$shipment_id.'#vgm')->with('message','Raw Material Update Successfully.');
    }
}
