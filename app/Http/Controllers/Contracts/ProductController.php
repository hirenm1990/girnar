<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Contracts;
use App\Shipments;
use App\ContractProducts;
use App\LodingPortDetails;
use App\Products;
use App\Packages;

class ProductController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::find( $shipment_id );
    	$contract_products = ContractProducts::where('shipment_id',$shipment_id)->get();
    	$loding_port_details = LodingPortDetails::where('shipment_id',$shipment_id)->get();
    	$products = Products::where('isActive',1)->get();
    	$packages = Packages::where('isActive',1)->get();
    	
        return view('contract.product',compact('packages','products','loding_port_details','shipment','contract_products'));
    }


    public function update( Request $request, $shipment_id )
    {
    	$input = $request->all();

        $shipment = Shipments::find( $shipment_id );
        $shipment->contract_id = $input['contract_id'];
        $shipment->shipment_code = $input['shipment_code'];
        $shipment->shipment = $input['shipment'];
        $shipment->shipment_notes = $input['shipment_notes'];
        $shipment->container_size_twenty = $input['container_size_twenty'];
        $shipment->container_size_forty = $input['container_size_forty'];
        $shipment->quotation_freight_twenty = $input['quotation_freight_twenty'];
        $shipment->quotation_freight_forty = $input['quotation_freight_forty'];
        $shipment->save();
        
        ContractProducts::where('shipment_id',$shipment_id)->delete();
        foreach ($input['discharge_port'] as $key => $value) {
            $product = new ContractProducts;
            $product->contract_id = $shipment->contract_id;
            $product->shipment_id = $shipment->id;
            $product->discharge_port = $input['discharge_port'][$key];
            $product->product_id = $input['product_id'][$key];
            $product->package_id = $input['package_id'][$key];
            $product->specification =$input['specification'][$key];
            $product->qty =$input['qty'][$key];
            $product->rate = $input['rate'][$key];
            $product->amount = $input['amount'][$key];
            $product->save();
        }   
        
        return Redirect('contract/detail/'.$shipment_id.'#products')->with('message','Product Update Successfully.');
    }
}
