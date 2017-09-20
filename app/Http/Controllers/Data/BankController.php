<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\BankDetails;

class BankController extends Controller
{
    public function index()
    {
        return view('bank.index');
    }
    public function create()
    {
    	return view('bank.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:bank_details',
           'address' =>'required',
           'account_no' =>'required',
        ];

        $message = [
            'unique' => "This Bank Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $bank = new BankDetails;
        $bank->name = $input['name'];
        $bank->address = $input['address'];
        $bank->phone = $input['phone'];
        $bank->phone2 = $input['phone2'];
        $bank->account_no = $input['account_no'];
        $bank->swift_code = $input['swift_code'];
        $bank->save();

        return redirect('banks')->with('message','Bank Add Successfully.');
    }
    public function edit($bank_id)
    {
    	$bank = BankDetails::find($bank_id);
        return view('bank.edit',compact('bank'));
    }
    public function update(Request $request, $bank_id)
    {   
    	$input = $request->all();
        $rules = [
           'name' =>'required',
           'address' =>'required',
           'account_no' =>'required',
        ];

        $message = [
            'unique' => "This Bank Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $bank = BankDetails::find($bank_id);
        $bank->name = $input['name'];
        $bank->address = $input['address'];
        $bank->phone = $input['phone'];
        $bank->phone2 = $input['phone2'];
        $bank->account_no = $input['account_no'];
        $bank->swift_code = $input['swift_code'];
        $bank->save();

        return redirect('banks')->with('message','Bank Update Successfully.');
    }
    public function delete($bank_id)
    {
    	$bank = BankDetails::find($bank_id);
        $bank->isActive = 0;
        $bank->save();

        return redirect('banks')->with('message','Bank Delete Successfully.');
    }
    public function data()
    {
        $banks = BankDetails::where('isActive',1)->get();
        return Datatables::of($banks)
        ->addIndexColumn()
        ->editColumn('phone', function ($banks) { if(empty($banks->phone)) { return '-'; }else { return $banks->phone; } })
        ->addColumn('action', function ($banks) {
            return '<a href="bank/edit/'.$banks->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="bank/delete/'.$banks->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);	
    }
}
