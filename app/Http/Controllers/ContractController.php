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
use App\Products;
use App\Packages;
use App\ContractProducts;
use App\LodingPortDetails;
use App\BankDetails;
use App\CompanyDetails;


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
        $products = Products::where('isActive',1)->get();
        $packages = Packages::where('isActive',1)->get();
        $banks = BankDetails::where('isActive',1)->get();
        $companys = CompanyDetails::where('isActive',1)->get();

        return view('contract.create',compact('companys','banks','countries','packages','products','final_destinations','discharge_ports','ports','surveyors','dollor_exchanges','buyers','delivery_terms','payment_terms'));
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

        foreach($input['shipment'] as $key => $value){
            $shipment = new Shipments;
            $shipment->contract_id = $contract->id;
            $shipment->shipment_code = $input['shipment_code'][$key];
            $shipment->shipment = $input['shipment'][$key];
            $shipment->shipment_notes = $input['shipment_notes'][$key];
            $shipment->container_size_twenty = $input['container_size_twenty'][$key];
            $shipment->container_size_forty = $input['container_size_forty'][$key];
            $shipment->quotation_freight_twenty = $input['quotation_freight_twenty'][$key];
            $shipment->quotation_freight_forty = $input['quotation_freight_forty'][$key];
            $shipment->save();

            foreach ($input['shipment_code_product'] as $key => $value) {
                if($value == $shipment->shipment_code){
                    $product = new ContractProducts;
                    $product->contract_id = $contract->id;
                    $product->shipment_id = $shipment->id;
                    
                    $ports = explode(",",$input['discharge_port'][$key]);
                        $loding_port_detail = new LodingPortDetails;
                        $loding_port_detail->contract_id = $contract->id;
                        $loding_port_detail->shipment_id = $shipment->id;
                        $loding_port_detail->loading_port_id = $ports[0];
                        $loding_port_detail->discharge_port_id = $ports[1];
                        $loding_port_detail->final_destination_id = $ports[2];
                        $loding_port_detail->destination_country_id = $ports[3];
                        $loding_port_detail->save();    

                    $product->discharge_port =  $loding_port_detail->id;  
                    $product->product_id = $input['product_id'][$key];
                    $product->package_id = $input['package_id'][$key];
                    $product->specification = $input['specification'][$key];
                    $product->qty = $input['qty'][$key];
                    $product->rate = $input['rate'][$key];
                    $product->amount = $input['amount'][$key];
                    $product->save();
                }
            }
        }

        return redirect('contracts')->with('message','Contract Added Successfully');
    }


    public function edit( $contract_id )
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


    public function update( Request $request, $contract_id )
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


    public function delete( $contract_id )
    {
        $contract = Contracts::find($contract_id);
        // $contract->isActive = 0;
        // $contract->save();
        return redirect('contracts')->with('message','Contract Duplicate Successfully.');
    }


    public function data()
    {
        $shipment = Shipments::where('isActive',1)->with('contract')->orderBy('created_at','asc')->get();

        return Datatables::of($shipment)
            ->addIndexColumn()
            ->editColumn('contract_date', function ($shipment) {
                return (empty($shipment->contract->contract_date)) ? '-' : $shipment->contract->contract_date;
            })
            ->editColumn('ci_no', function ($shipment) {
                // code
            })
            ->editColumn('destination', function ($shipment) { 
                // code
            })
            ->editColumn('products', function ($shipment) { 
                // code
            })
            ->editColumn('shipment', function ($shipment) { 
                // code
            })
            ->editColumn('do', function ($shipment) { 
                // code
            })
            ->editColumn('rm', function ($shipment) { 
                // code
            })
            ->editColumn('sf', function ($shipment) { 
                // code
            })
            ->editColumn('ci', function ($shipment) { 
                // code
            })
            ->editColumn('buyer_id', function ($shipment) { return $shipment->contract->buyer->name; })
            ->addColumn('action', function ($shipment) {
                return '<a href="contract/delete/'.$shipment->id.'" class="btn btn-primary btn-sm delete"><i class="fa fa-external-link"></i></a>&nbsp;';
            })
            ->addColumn('contract_no', function ($shipment) { 
                return '<a href="contract/detail/'.$shipment->id.'">'.$shipment->contract->contract_no.'-'.$shipment->shipment_code.'</a>';
            })
            ->rawColumns(['contract_no', 'action'])
            ->make(true);
    }


    public function ajaxgetbuyerdetails(Request $request)
    {
        $input = $request->all();

        return $buyer = BuyerDetails::find($input['buyer_id']);
    }


    public function detail( $shipment_id )
    {
        $shipment = Shipments::find( $shipment_id );
        $contract_ships = Contracts::where('id', $shipment->contract->id )->with('shipments')->get();

        return view('contract.detail',compact('shipment_id','contract_ships','shipment'));
    }
}
