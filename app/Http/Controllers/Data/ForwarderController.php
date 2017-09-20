<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Forwarders;

class ForwarderController extends Controller
{
    public function index()
    {
    	return view('forwarder.index');
    }
    public function create()
    {
    	return view('forwarder.create');
    }
    public function store(Request $request)
    {
    	$input = $request->all();
        $rules = [
           'name' =>'required|unique:forwarders',
           'contact_person' =>'required',
        ];

        $message = [
            'unique' => "This Forwarder Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        
        $forwarder = new Forwarders;
        $forwarder->name = $input['name'];
        $forwarder->contact_person = $input['contact_person'];
        $forwarder->phone = $input['phone'];
        $forwarder->email = $input['email'];
        $forwarder->save();

    	return Redirect('forwarders')->with('message','Forwarder Added Successfully.');
    }
    public function edit($deliveryorder_id)
    {
    	$forwarder = Forwarders::find($deliveryorder_id);
    	return view('forwarder.edit',compact('forwarder'));
    }
    public function update(Request $request, $deliveryorder_id)
    {
    	$input = $request->all();
        $rules = [
           'name' =>'required',
           'contact_person' =>'required',
        ];

        $message = [
            'unique' => "This Forwarder Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        
        $forwarder = Forwarders::find($deliveryorder_id);
        $forwarder->name = $input['name'];
        $forwarder->contact_person = $input['contact_person'];
        $forwarder->phone = $input['phone'];
        $forwarder->email = $input['email'];
        $forwarder->save();
        
    	return Redirect('forwarders')->with('message','Forwarder Update Successfully.');	
    }
    public function delete($deliveryorder_id)
    {
    	$forwarder = Forwarders::find($deliveryorder_id);
    	$forwarder->isActive = 0;
    	$forwarder->save();
    	return Redirect('forwarders')->with('message','Forwarder Delete Successfully.');	
    }
    public function data()
    {
    	$forwarders = Forwarders::where('isActive',1)->get();
        return Datatables::of($forwarders)
        ->addIndexColumn()
        ->editColumn('phone', function ($forwarders) { if(empty($forwarders->phone)) { return '-'; }else { return $forwarders->phone; } })
        ->addColumn('action', function ($forwarders) {
            return '<a href="forwarder/edit/'.$forwarders->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="forwarder/delete/'.$forwarders->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}