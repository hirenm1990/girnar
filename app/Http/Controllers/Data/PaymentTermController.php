<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\PaymentTerms;

class PaymentTermController extends Controller
{
    public function index()
    {
    	return view('paymentterm.index');
    }
    public function create()
    {
        return view('paymentterm.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:payment_terms',
        ];

        $message = [
            'unique' => "This Payment Term Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $paymentterm = new PaymentTerms;
        $paymentterm->name = $input['name'];
        $paymentterm->save();

    	return redirect('paymentterms')->with('message','Payment Term Added Successfully.');
    }
    public function edit($paymentterm_id)
    {
    	$paymentterm = PaymentTerms::find($paymentterm_id);
        return view('paymentterm.edit',compact('paymentterm'));
    }
    public function update(Request $request, $paymentterm_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Surveyor Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $paymentterm = PaymentTerms::find($paymentterm_id);
        $paymentterm->name = $input['name'];
        $paymentterm->save();

        return redirect('paymentterms')->with('message','Payment Term Update Successfully.');
    }
    public function delete($paymentterm_id)
    {
    	$paymentterm = PaymentTerms::find($paymentterm_id);
        $paymentterm->isActive = 0;
        $paymentterm->save();
        return redirect('paymentterms')->with('message','Payment Term Delete Successfully.');
    }
    public function data()
    {
    	$paymentterms = PaymentTerms::where('isActive',1)->get();
        return Datatables::of($paymentterms)
        ->addIndexColumn()
        ->addColumn('action', function ($paymentterms) {
            return '<a href="paymentterm/edit/'.$paymentterms->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="paymentterm/delete/'.$paymentterms->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
