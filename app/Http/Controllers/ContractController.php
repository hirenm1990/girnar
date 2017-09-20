<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,DataTables;
use App\Contracts;
use App\Surveyors;
use App\DollorExchanges;
use App\BuyerDetails;
use App\DeliveryTerms;
use App\PaymentTerms;
use App\Shipments;
use App\Ports;
use App\DischargePorts;
use App\FinalDestinations;
use App\Countries;


class ContractController extends Controller
{
	public function index() 
	{
        return view('contract.index');
    }
    public function create() 
    {
        $surveyors = Surveyors::where('isActive',1)->get();
        $dollor_exchanges = DollorExchanges::where('isActive',1)->get();
        $buyers = BuyerDetails::where('isActive',1)->get();
        $delivery_terms = DeliveryTerms::where('isActive',1)->get();
        $payment_terms = PaymentTerms::where('isActive',1)->get();
        $countries = Countries::where('isActive',1)->get();
        $final_destinations = FinalDestinations::where('isActive',1)->get();
        $discharge_ports = DischargePorts::where('isActive',1)->get();
        $ports = Ports::where('isActive',1)->get();

        return view('contract.create',compact('countries','final_destinations','discharge_ports','ports','surveyors','dollor_exchanges','buyers','delivery_terms','payment_terms'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'contract_no' =>'required|unique:contracts',
           'contract_date' =>'required',
           'buyer_name' =>'required',
           'notifier_party' =>'required',
           'consignee_party' =>'required',
           'dollor_exchange_rate' =>'required',
        ];

        $message = [
            'unique' => "This Contract No Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $contract = new Contracts;
        $contract->contract_no = $input['contract_no'];
        $contract->contract_date = date('Y-m-d',strtotime($input['contract_date']));
        $contract->surveyor_id = $input['surveyor_id'];
        $contract->buyer_id = $input['buyer_id'];
        $contract->buyer_name = $input['buyer_name'];
        $contract->buyer_address = $input['buyer_address'];
        $contract->notifier_party = $input['notifier_party'];
        $contract->consignee_party = $input['consignee_party'];
        $contract->delivery_terms_id = $input['delivery_terms_id'];
        $contract->payment_terms_id = $input['payment_terms_id'];
        $contract->dollor_exchange_rate = $input['dollor_exchange_rate'];
        $contract->dollor_exchange_id = $input['dollor_exchange_id'];
        $contract->save();

        foreach($input['shipment'] as $key => $value){
            $shipment = new Shipments;
            $shipment->contract_id = $contract->id;
            $shipment->shipment = $input['shipment'][$key];  
            $shipment->shipment_notes = $input['shipment_notes'][$key];  
            $shipment->buyer_name = $input['buyer_name_shipment'][$key];  
            $shipment->buyer_address = $input['buyer_address_shipment'][$key];  
            $shipment->loading_port_id = $input['loading_port_id'][$key];  
            $shipment->discharge_port_id = $input['discharge_port_id'][$key];  
            $shipment->final_destination_id = $input['final_destination_id'][$key];  
            $shipment->destination_country_id = $input['destination_country_id'][$key];
            $shipment->save();
        }
        
        return redirect('contracts')->with('message','Contract Added Successfully');
    }
    public function edit($contract_id)
    {
        $surveyors = Surveyors::where('isActive',1)->get();
        $dollor_exchanges = DollorExchanges::where('isActive',1)->get();
        $buyers = BuyerDetails::where('isActive',1)->get();
        $delivery_terms = DeliveryTerms::where('isActive',1)->get();
        $payment_terms = PaymentTerms::where('isActive',1)->get();
        $ports = Ports::where('isActive',1)->get();
        $final_destinations = FinalDestinations::where('isActive',1)->get();
        $discharge_ports = DischargePorts::where('isActive',1)->get();
        $countries = Countries::where('isActive',1)->get();
        $shipments = Shipments::where('contract_id',$contract_id)->get();
        $contract = Contracts::find($contract_id);
        return view('contract.edit',compact('contract','shipments','countries','discharge_ports','final_destinations','ports','surveyors','dollor_exchanges','buyers','delivery_terms','payment_terms'));
    }
    public function update(Request $request, $contract_id)
    {
        $input = $request->all();
        $rules = [
           'contract_no' =>'required',
           'contract_date' =>'required',
           'buyer_name' =>'required',
           'notifier_party' =>'required',
           'consignee_party' =>'required',
           'dollor_exchange_rate' =>'required',
        ];

        $message = [
            'unique' => "This Contract No Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $contract = Contracts::find($contract_id);
        $contract->contract_no = $input['contract_no'];
        $contract->contract_date = date('Y-m-d',strtotime($input['contract_date']));
        $contract->surveyor_id = $input['surveyor_id'];
        $contract->buyer_id = $input['buyer_id'];
        $contract->buyer_name = $input['buyer_name'];
        $contract->buyer_address = $input['buyer_address'];
        $contract->notifier_party = $input['notifier_party'];
        $contract->consignee_party = $input['consignee_party'];
        $contract->delivery_terms_id = $input['delivery_terms_id'];
        $contract->payment_terms_id = $input['payment_terms_id'];
        $contract->dollor_exchange_rate = $input['dollor_exchange_rate'];
        $contract->dollor_exchange_id = $input['dollor_exchange_id'];
        $contract->save();

        if(!empty($input['shipment'])) {
            Shipments::where('contract_id', $contract->id)->delete();
            foreach($input['shipment'] as $key => $value){
                $shipment = new Shipments;
                $shipment->contract_id = $contract->id;
                $shipment->shipment = $input['shipment'][$key];  
                $shipment->shipment_notes = $input['shipment_notes'][$key];  
                $shipment->buyer_name = $input['buyer_name_shipment'][$key];  
                $shipment->buyer_address = $input['buyer_address_shipment'][$key];  
                $shipment->loading_port_id = $input['loading_port_id'][$key];  
                $shipment->discharge_port_id = $input['discharge_port_id'][$key];  
                $shipment->final_destination_id = $input['final_destination_id'][$key];  
                $shipment->destination_country_id = $input['destination_country_id'][$key];
                $shipment->save();
            }
        }

        return redirect('contracts')->with('message','Contract Update Successfully.');
    }
    public function delete($contract_id)
    {
        $contract = Contracts::find($contract_id);
        $contract->isActive = 0;
        $contract->save();
        return redirect('contracts')->with('message','Contract Delete Successfully.');
    }
    public function data()
    {
        $contracts = Contracts::where('isActive',1)->get();
        return Datatables::of($contracts)
        ->addIndexColumn()
        ->addColumn('contract_no', function ($contracts) { 
            return '<a href="contract/detail/'.$contracts->id.'">'.$contracts->contract_no.'</a>';
        })
        ->editColumn('contract_date', function ($contracts) { if(empty($contracts->contract_date)) { return '-'; }else { return $contracts->contract_date; } })
        ->editColumn('buyer_id', function ($contracts) { return $contracts->buyer->name; })
        ->addColumn('action', function ($contracts) {
            return '<a href="contract/edit/'.$contracts->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="contract/delete/'.$contracts->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
    public function ajaxgetbuyerdetails(Request $request)
    {
        $input = $request->all();
        return $buyer = BuyerDetails::find($input['buyer_id']);
    }
    public function detail( $contract_id )
    {
        $contract = Contracts::where('id',$contract_id )->with('shipments')->first();
        $shipments = Shipments::where('contract_id',$contract_id )->with('contract')->get();
        return view('contract.detail',compact('contract','shipments'));
    }
}
