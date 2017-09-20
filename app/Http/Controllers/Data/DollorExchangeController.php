<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\DollorExchanges;

class DollorExchangeController extends Controller
{
    public function index()
    {
    	return view('dollorexchange.index');
    }
    public function create()
    {
        return view('dollorexchange.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:dollor_exchanges',
        ];

        $message = [
            'unique' => "This Dollor Exchange Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $dollor_exchange = new DollorExchanges;
        $dollor_exchange->name = $input['name'];
        $dollor_exchange->save();

    	return redirect('dollorexchanges')->with('message','Dollor Exchange Added Successfully.');
    }
    public function edit($dollor_exchange_id)
    {
    	$dollorexchange = DollorExchanges::find($dollor_exchange_id);
        return view('dollorexchange.edit',compact('dollorexchange'));
    }
    public function update(Request $request, $dollor_exchange_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Dollor Exchange Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $dollor_exchange = DollorExchanges::find($dollor_exchange_id);
        $dollor_exchange->name = $input['name'];
        $dollor_exchange->save();

        return redirect('dollorexchanges')->with('message','Dollor Exchange Update Successfully.');
    }
    public function delete($dollor_exchange_id)
    {
    	$dollor_exchange = DollorExchanges::find($dollor_exchange_id);
        $dollor_exchange->isActive = 0;
        $dollor_exchange->save();
        return redirect('dollorexchanges')->with('message','Dollor Exchange Delete Successfully.');
    }
    public function data()
    {
    	$dollor_exchanges = DollorExchanges::where('isActive',1)->get();
        return Datatables::of($dollor_exchanges)
        ->addIndexColumn()
        ->addColumn('action', function ($dollor_exchanges) {
            return '<a href="dollorexchange/edit/'.$dollor_exchanges->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="dollorexchange/delete/'.$dollor_exchanges->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
