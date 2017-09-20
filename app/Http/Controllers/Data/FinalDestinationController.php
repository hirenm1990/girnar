<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\FinalDestinations;
class FinalDestinationController extends Controller
{
    public function index()
    {
    	return view('finaldestination.index');
    }
    public function create()
    {
        return view('finaldestination.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:final_destination',
        ];

        $message = [
            'unique' => "This Bank Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $final_destination = new FinalDestinations;
        $final_destination->name = $input['name'];
        $final_destination->save(); 
    	return redirect('finaldestinations')->with('message','Final Destination Added Successfully.');
    }
    public function edit($finaldestination_id)
    {
        $final_destination = FinalDestinations::find($finaldestination_id);
        return view('finaldestination.edit',compact('final_destination')); 	
    }
    public function update(Request $request, $finaldestination_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $final_destination = FinalDestinations::find($finaldestination_id);
        $final_destination->name = $input['name'];
        $final_destination->save();
        return redirect('finaldestinations')->with('message','Final Destination Update Successfully.');	
    }
    public function delete($finaldestination_id)
    {
    	$final_destination = FinalDestinations::find($finaldestination_id);
        $final_destination->isActive = 0;
        $final_destination->save();
        return redirect('finaldestinations')->with('message','Final Destination Delete Successfully.');
    }
    public function data()
    {
    	$final_destinations = FinalDestinations::where('isActive',1)->get();
        return Datatables::of($final_destinations)
        ->addIndexColumn()
        ->addColumn('action', function ($final_destinations) {
            return '<a href="finaldestination/edit/'.$final_destinations->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="finaldestination/delete/'.$final_destinations->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
