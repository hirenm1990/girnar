<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadDocsController extends Controller
{
    public function edit( $shipment_id )
    {
    	return view('contract.uploaddocs',compact('shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
    	return Redirect('contract/detail/'.$shipment_id.'#upload-docs')->with('message','Upload Docs Update Successfully.');
    }
}
