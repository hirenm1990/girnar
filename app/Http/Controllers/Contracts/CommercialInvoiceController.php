<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommercialInvoiceController extends Controller
{
    public function edit( $shipment_id )
    {
    	return view('contract.comminvoice',compact('shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
    	return Redirect('contract/detail/'.$shipment_id.'#raw-material')->with('message','Commercial Invoice Update Successfully.');
    }
}
