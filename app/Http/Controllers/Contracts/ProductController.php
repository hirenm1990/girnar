<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Contracts;
use App\Shipments;

class ProductController extends Controller
{
    public function edit( $shipment_id )
    {
    	$shipment = Shipments::find( $shipment_id );
    	return view('contract.product',compact('shipment'));
    }
}
