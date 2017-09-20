<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\BuyerDetails;

class BuyerController extends Controller
{
    public function index()
    {
    	return view('buyer.index');
    }
    public function create()
    {
        return view('buyer.create');	
    }
    public function store(Request $request)
    {
    	$input = $request->all();
        $rules = [
           'name' =>'required|unique:buyer_details',
           'address' =>'required',
           'country' =>'required',
        ];

        $message = [
            'unique' => "This Bank Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $buyer = new BuyerDetails;
        $buyer->name = $input['name'];
        $buyer->address = $input['address'];
        $buyer->country = $input['country'];
        $buyer->phone = $input['phone'];
        $buyer->save();

        return redirect('buyers')->with('message','Buyer Added Successfully.');
    }
    public function edit($buyer_id)
    {
    	$buyer = BuyerDetails::find($buyer_id);
        return view('buyer.edit',compact('buyer'));
    }
    public function update(Request $request, $buyer_id)
    {   
        $input = $request->all();
        $rules = [
           'name' =>'required',
           'address' =>'required',
           'country' =>'required',
        ];

        $message = [
            'unique' => "This Bank Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $buyer = BuyerDetails::find($buyer_id);
        $buyer->name = $input['name'];
        $buyer->address = $input['address'];
        $buyer->country = $input['country'];
        $buyer->phone = $input['phone'];
        $buyer->save();

        return redirect('buyers')->with('message','Buyer Update Successfully.');
    }
    public function delete($buyer_id)
    {
    	$buyer = BuyerDetails::find($buyer_id);
        $buyer->isActive = 0;
        $buyer->save();
        return redirect('buyers')->with('message','Buyer Delete Successfully.');
    }
    public function data()
    {
    	$buyers = BuyerDetails::where('isActive',1)->get();
        return Datatables::of($buyers)
        ->addIndexColumn()
        ->editColumn('phone', function ($buyers) { if(empty($buyers->phone)) { return '-'; }else { return $buyers->phone; } })
        ->editColumn('country', function ($buyers) { if(empty($buyers->country)) { return '-'; }else { return $buyers->country; } })
        ->addColumn('action', function ($buyers) {
            return '<a href="buyer/edit/'.$buyers->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="buyer/delete/'.$buyers->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
