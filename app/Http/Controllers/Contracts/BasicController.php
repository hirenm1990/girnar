<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use Validator,Redirect,DataTables;
use App\Http\Controllers\Controller;
use App\Surveyors;
use App\BuyerDetails;
use App\DollorExchanges;
use App\DeliveryTerms;
use App\PaymentTerms;
use App\LodingPortDetails;
use App\Contracts;
use App\Shipments;

class BasicController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::find( $shipment_id );
        $contract = Contracts::find( $shipment->contract->id );
        $surveyors = Surveyors::where('isActive',1)->get();
    	$buyers = BuyerDetails::where('isActive',1)->get();
    	$dollor_exchanges = DollorExchanges::where('isActive',1)->get();
		$delivery_terms = DeliveryTerms::where('isActive',1)->get();
		$payment_terms = PaymentTerms::where('isActive',1)->get();
        $loding_port_detail = LodingPortDetails::where('contract_id',$contract->id)->get();
    	return view('contract.basic',compact('shipment_id','contract','contract_id','surveyors','buyers','dollor_exchanges','delivery_terms','payment_terms'));
    }


    public function update(Request $request)
    {
    	return $input = $request->all();
    }
}
