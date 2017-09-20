<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\DeliveryTerms;
class DeliveryTermController extends Controller
{
    public function index()
    {
    	return view('deliveryterm.index');
    }
    public function create()
    {
        return view('deliveryterm.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:delivery_terms',
        ];

        $message = [
            'unique' => "This Delivery Term Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $delivery_term = new DeliveryTerms;
        $delivery_term->name = $input['name'];
        $delivery_term->save();
    	return redirect('deliveryterms')->with('message','Delivery Term Added Successfully.');
    }
    public function edit($deliveryterm_id)
    {
    	$delivery_term = DeliveryTerms::find($deliveryterm_id);
        return view('deliveryterm.edit',compact('delivery_term'));
    }
    public function update(Request $request, $deliveryterm_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This  Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $delivery_term = DeliveryTerms::find($deliveryterm_id);
        $delivery_term->name = $input['name'];
        $delivery_term->save();
        return redirect('deliveryterms')->with('message','Delivery Term Update Successfully.');
    }
    public function delete($deliveryterm_id)
    {
    	$delivery_term = DeliveryTerms::find($deliveryterm_id);
        $delivery_term->isActive = 0;
        $delivery_term->save();
        return redirect('deliveryterms')->with('message','Delivery Term Delete Successfully.');
    }
    public function data()
    {
    	$delivery_terms = DeliveryTerms::where('isActive',1)->get();
        return Datatables::of($delivery_terms)
        ->addIndexColumn()
        ->addColumn('action', function ($delivery_terms) {
            return '<a href="deliveryterm/edit/'.$delivery_terms->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="deliveryterm/delete/'.$delivery_terms->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
