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
use App\CompanyDetails;
use App\BankDetails;

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
        $companys = CompanyDetails::where('isActive',1)->get();
        $banks = BankDetails::where('isActive',1)->get();
    	
        return view('contract.basic',compact('banks','companys','shipment_id','contract','contract_id','surveyors','buyers','dollor_exchanges','delivery_terms','payment_terms'));
    }


    public function update(Request $request, $shipment_id)
    {
    	$input = $request->all();
        $shipment = Shipments::find( $shipment_id );
        
        $contract = Contracts::find( $shipment->contract->id );
        $contract->contract_no = $input['contract_no'];
        $contract->contract_date = date('Y-m-d',strtotime($input['contract_date']));
        $contract->surveyor_id = $input['surveyor_id'];
        $contract->purchase_order_no = $input['purchase_order_no'];
        $contract->buyer_id = $input['buyer_id'];
        $contract->buyer_name = $input['buyer_name'];
        $contract->buyer_address = $input['buyer_address'];
        $contract->notifier_party = $input['notifier_party'];
        $contract->consignee_party = $input['consignee_party'];
        $contract->delivery_terms_id = $input['delivery_terms_id'];
        $contract->payment_terms_id = $input['payment_terms_id'];
        $contract->dollor_exchange_rate = $input['dollor_exchange_rate'];
        $contract->dollor_exchange_id = $input['dollor_exchange_id'];
        $contract->bank_id = $input['bank_id'];
        $contract->company_id = $input['company_id'];
        $contract->save();

        return Redirect('contract/detail/'.$shipment->id.'#basic')->with('message','Contract Update Successfully.');
    }
}
