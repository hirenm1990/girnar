<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StuffingInvoices;

use App\Contracts;
use App\ContractProducts;
use App\Shipments;
use App\Containers;
use App\ContainerProducts;


class StuffingController extends Controller
{
    public function edit( $shipment_id )
    {
     	$shipment = Shipments::where( 'id', $shipment_id )->first();
    	$contract = Contracts::find( $shipment->contract->id );
    	$stuffing = StuffingInvoices::where('shipment_id',$shipment_id)->first();
    	$contract_products = ContractProducts::where( 'shipment_id', $shipment_id )->get();
    	
    	if( !$stuffing ) {
    		$stuffing_invoice = new StuffingInvoices;
    		$stuffing_invoice->shipment_id = $shipment_id;
    		$stuffing_invoice->contract_id = $contract->id;
    		$stuffing_invoice->save();
    	}

    	return view('contract.stuffing',compact('contract_products','stuffing','shipment','shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
    	$input = $request->all();

    	$shipment = Shipments::find( $shipment_id );
    	$contract = Contracts::find( $shipment->contract->id );

    	$stuffing_invoice = new StuffingInvoices;
    	$stuffing_invoice->contract_id = $contract->id;
    	$stuffing_invoice->shipment_id = $shipment_id;
    	$stuffing_invoice->invoice_no = $input['invoice_no'];
    	$stuffing_invoice->invoice_date = date('d-m-Y',strtotime( $input['invoice_date'] ));
    	$stuffing_invoice->are_no = $input['are_no'];
    	$stuffing_invoice->are_date = date('d-m-Y',strtotime( $input['are_date'] ));
    	$stuffing_invoice->dbk_rate = $input['dbk_rate'];
    	$stuffing_invoice->file_no = $input['file_no'];
    	$stuffing_invoice->freight = $input['freight'];
    	$stuffing_invoice->extra_charge_name = $input['extra_charge_name'];
    	$stuffing_invoice->extra_charge_amount = $input['extra_charge_amount'];
    	$stuffing_invoice->examining_officer = $input['examining_officer'];
    	$stuffing_invoice->supervision_officer = $input['supervision_officer'];
    	$stuffing_invoice->examined = $input['examined'];
    	$stuffing_invoice->container_markings = $input['container_markings'];
    	$stuffing_invoice->save();

    	return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Update Successfully.');
    }
}
