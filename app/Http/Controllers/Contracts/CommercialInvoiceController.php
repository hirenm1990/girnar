<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BuyerDetails;
use App\Contracts;
use App\Shipments;
use App\CompanyDetails;
use App\BankDetails;
use App\LodingPortDetails;
use App\Countries;
use App\DeliveryTerms;
use App\PaymentTerms;
use App\CommercialInvoiceDetails;
use App\ContractProducts;
use App\DocumentStatus;

class CommercialInvoiceController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::find( $shipment_id );
		$contract = Contracts::find( $shipment->contract->id );
		$loding_port_details = LodingPortDetails::where('contract_id',$contract->id)->get();
		$buyers = BuyerDetails::where('isActive',1)->get();
		$companys = CompanyDetails::where('isActive',1)->get();
		$banks = BankDetails::where('isActive',1)->get();
		$buyers = BuyerDetails::where('isActive',1)->get();
		$countries = Countries::where('isActive',1)->get();
		$delivery_terms = DeliveryTerms::where('isActive',1)->get();
		$payment_terms = PaymentTerms::where('isActive',1)->get();
		$contract_product = ContractProducts::where('contract_id', $contract->id )->first();
		$loding_port_detail_id = $contract_product->discharge_port;
		$comm_invoice = CommercialInvoiceDetails::where('shipment_id',$shipment_id)->first();
		$document_status = DocumentStatus::where('shipment_id',$shipment_id)->first();
		
		if( !$comm_invoice ) {
			
			$comm_invoice = new CommercialInvoiceDetails;
			$comm_invoice->contract_id = $contract->id;
			$comm_invoice->shipment_id = $shipment_id;
			$comm_invoice->save();
		}

    	return view('contract.comminvoice',compact('comm_invoice','loding_port_detail_id','payment_terms','delivery_terms','countries','buyers','loding_port_details','banks','companys','buyers','contract','shipment','shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
    	$input = $request->all();

    	$shipment = Shipments::find( $shipment_id );
		$contract = Contracts::find( $shipment->contract->id );

		$comm_invoice = CommercialInvoiceDetails::find( $shipment->commeinvoice->id );
		
		$comm_invoice->contract_id = $contract->id;
		$comm_invoice->shipment_id = $shipment_id;
		$comm_invoice->company_name = $input['company_name'];
		$comm_invoice->company_detail = $input['company_detail'];
		$comm_invoice->bank_name = $input['bank_name'];
		$comm_invoice->bank_detail = $input['bank_detail'];
		$comm_invoice->buyer_name = $input['buyer_name'];
		$comm_invoice->buyer_address = $input['buyer_address'];
		$comm_invoice->buyer_bank_name = $input['buyer_bank_name'];
		$comm_invoice->buyer_bank_details = $input['buyer_bank_details'];
		$comm_invoice->notify_party = $input['notify_party'];
		$comm_invoice->consignee_party = $input['consignee_party'];
		$comm_invoice->comm_invoice_no = $input['comm_invoice_no'];
		( $input['comm_invoice_date'] !="" ) ? $comm_invoice->comm_invoice_date = date('Y-m-d',strtotime( $input['comm_invoice_date'] )) :"NULL";
		$comm_invoice->lc_no = $input['lc_no'];
		( $input['lc_date'] !="" ) ? $comm_invoice->lc_date = date('Y-m-d',strtotime( $input['lc_date'] )) :"NULL";
		$comm_invoice->bl_no = $input['bl_no'];
		( $input['bl_date'] !="" ) ? $comm_invoice->bl_date = date('Y-m-d',strtotime( $input['bl_date'] )) :"NULL";
		$comm_invoice->vessel_no = $input['vessel_no'];
		$comm_invoice->loding_port_detail_id = $input['loding_port_detail_id'];
		$comm_invoice->country_of_origin = $input['country_of_origin'];
		$comm_invoice->country_of_final_destination = $input['country_of_final_destination'];
		$comm_invoice->terms_of_delivery = $input['terms_of_delivery'];
		$comm_invoice->terms_of_payment = $input['terms_of_payment'];
		$comm_invoice->drawn_under = $input['drawn_under'];
		$comm_invoice->specification = $input['specification'];
		$comm_invoice->comm_invoice_notes = $input['comm_invoice_notes'];
		$comm_invoice->comm_invoice_discount = $input['comm_invoice_discount'];
		( $input['eta_date'] !="" ) ? $comm_invoice->eta_date = date('Y-m-d',strtotime( $input['eta_date'] )) :"NULL";
		$comm_invoice->save();

		// $document_status = new DocumentStatus;
		// $document_status->contract_id = $contract->id;
		// $document_status->shipment_id = $shipment_id;
		// $document_status->status = $input['document_status'];
		// ( $input['document_ready_on'] !="" ) ? $document_status->date = date('Y-m-d',strtotime( $input['document_ready_on'] )) :"NULL";
		// $document_status->save(); 

    	return Redirect('contract/detail/'.$shipment_id.'#comm-invoice')->with('message','Commercial Invoice Update Successfully.');
    }
}
