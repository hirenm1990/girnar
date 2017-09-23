<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Contracts;
use App\Shipments;
use App\ContractProducts;
use App\LodingPortDetails;

class ProductController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::find( $shipment_id );
    	$contract_products = ContractProducts::where('shipment_id',$shipment_id)->get();
    	return view('contract.product',compact('shipment','contract_products'));
    }
}
