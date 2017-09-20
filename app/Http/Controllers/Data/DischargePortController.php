<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\DischargePorts;

class DischargePortController extends Controller
{
    public function index()
    {
    	return view('dischargeport.index');
    }
    public function create()
    {
        return view('dischargeport.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:discharge_ports',
        ];

        $message = [
            'unique' => "This Discharge Port Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $discharge_port = new DischargePorts;
        $discharge_port->name = $input['name'];
        $discharge_port->save();
    	return redirect('dischargeports')->with('message','Discharge Port Added Successfully.');;
    }
    public function edit($dischargeport_id)
    {
    	$discharge_port = DischargePorts::find($dischargeport_id);
        return view('dischargeport.edit',compact('discharge_port'));
    }
    public function update(Request $request, $dischargeport_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Discharge Port Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $discharge_port = DischargePorts::find($dischargeport_id);
        $discharge_port->name = $input['name'];
        $discharge_port->save();
        return redirect('dischargeports')->with('message','Discharge Port Update Successfully.');;	
    }
    public function delete($dischargeport_id)
    {
    	$discharge_port = DischargePorts::find($dischargeport_id);
        $discharge_port->isActive = 0;
        $discharge_port->save();
        return redirect('dischargeports')->with('message','Discharge Port Delete Successfully.');;
    }
    public function data()
    {
    	$discharge_ports = DischargePorts::where('isActive',1)->get();
        return Datatables::of($discharge_ports)
        ->addIndexColumn()
        ->addColumn('action', function ($discharge_ports) {
            return '<a href="dischargeport/edit/'.$discharge_ports->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="dischargeport/delete/'.$discharge_ports->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
