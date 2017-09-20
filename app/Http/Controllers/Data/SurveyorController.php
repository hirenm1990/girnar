<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Surveyors;

class SurveyorController extends Controller
{
    public function index()
    {
    	return view('surveyor.index');
    }
    public function create()
    {
        return view('surveyor.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:surveyors',
        ];

        $message = [
            'unique' => "This Surveyor Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $surveyor = new Surveyors;
        $surveyor->name = $input['name'];
        $surveyor->save();

    	return redirect('dollorexchanges')->with('message','Surveyor Added Successfully.');
    }
    public function edit($surveyor_id)
    {
    	$surveyor = Surveyors::find($surveyor_id);
        return view('surveyor.edit',compact('surveyor'));
    }
    public function update(Request $request, $surveyor_id)
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

        $surveyor = Surveyors::find($surveyor_id);
        $surveyor->name = $input['name'];
        $surveyor->save();

        return redirect('surveyors')->with('message','Surveyor Update Successfully.');
    }
    public function delete($surveyor_id)
    {
    	$surveyor = Surveyors::find($surveyor_id);
        $surveyor->isActive = 0;
        $surveyor->save();
        return redirect('surveyors')->with('message','Surveyor Delete Successfully.');
    }
    public function data()
    {
    	$surveyors = Surveyors::where('isActive',1)->get();
        return Datatables::of($surveyors)
        ->addIndexColumn()
        ->addColumn('action', function ($surveyors) {
            return '<a href="surveyor/edit/'.$surveyors->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="surveyor/delete/'.$surveyors->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
