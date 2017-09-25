<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use Validator,Redirect,DataTables;
use App\Http\Controllers\Controller;

class RawMaterialController extends Controller
{
    public function edit( $shipment_id )
    {
    	return view('contract.rawmaterial',compact('shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
    	return Redirect('contract/detail/'.$shipment_id.'#raw-material')->with('message','Raw Material Update Successfully.');
    }
}
