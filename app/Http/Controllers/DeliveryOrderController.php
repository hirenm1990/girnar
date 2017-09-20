<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,DataTables;
use App\DeliveryOrders;
use App\Forwarders;

class DeliveryOrderController extends Controller
{
    public function index()
    {
    	return view('deliveryorder.index');
    }
    public function create()
    {
    	return view('deliveryorder.create');
    }
    public function store(Request $request)
    {
    	$input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Delivery Order Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        
        $deliveryorder = new DeliveryOrders;
        $deliveryorder->save();
    	return Redirect('deliveryorders')->with('message','Delivery Order Added Successfully.');
    }
    public function edit($deliveryorder_id)
    {
    	$forwarders = Forwarders::where('isActive',1)->get();
        $deliveryorder = DeliveryOrders::find($deliveryorder_id);
        return view('deliveryorder.edit',compact('forwarders','deliveryorder'));
    }
    public function update(Request $request, $deliveryorder_id)
    {
    	$input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Delivery Order Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        
        $deliveryorder = new DeliveryOrders;
        $deliveryorder->save();
        return Redirect('deliveryorders')->with('message','Delivery Order Update Successfully.');	
    }
    public function delete($deliveryorder_id)
    {
    	$deliveryorder = DeliveryOrders::find($deliveryorder_id);
        $deliveryorder->isActive = 0;
        $deliveryorder->save();
        return Redirect('deliveryorders')->with('message','Delivery Order Delete Successfully.');		
    }
    public function data()
    {
    	$deliveryorders = DeliveryOrders::where('isActive',1)->get();
    }
}
