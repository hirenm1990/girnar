<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Countries;

class CountrieController extends Controller
{
    public function index()
    {
    	return view('countrie.index');
    }
    public function create()
    {
        return view('countrie.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:countries',
        ];

        $message = [
            'unique' => "This Country Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $country = new Countries;
        $country->name = $input['name'];
        $country->save();
    	return redirect('countries')->with('message','Countries Added Successfully.');
    }
    public function edit($countrie_id)
    {
    	$country = Countries::find($countrie_id);
        return view('countrie.edit',compact('country'));
    }
    public function update(Request $request, $countrie_id)
    {
    	$input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Country Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $country = Countries::find($countrie_id);
        $country->name = $input['name'];
        $country->save();
        return redirect('countries')->with('message','Countries Update Successfully.');
    }
    public function delete($countrie_id)
    {
    	$country = Countries::find($countrie_id);
        $country->isActive = 0;
        $country->save();
        return redirect('countries')->with('message','Countries Delete Successfully.');
    }
    public function data()
    {
    	$countries = Countries::where('isActive',1)->get();
        return Datatables::of($countries)
        ->addIndexColumn()
        ->addColumn('action', function ($countries) {
            return '<a href="countrie/edit/'.$countries->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="countrie/delete/'.$countries->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
