<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VGMController extends Controller
{
    public function edit( $shipment_id )
    {
    	return view('contract.vgm',compact('shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
    	return Redirect('contract/detail/'.$shipment_id.'#vgm')->with('message','Raw Material Update Successfully.');
    }
}
