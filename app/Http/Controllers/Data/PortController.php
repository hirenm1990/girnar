<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Ports;
class PortController extends Controller
{
    public function index()
    {
    	return view('port.index');
    }
    public function create()
    {
        return view('port.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:ports',
        ];

        $message = [
            'unique' => "This Port Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $port = new Ports;
        $port->name = $input['name'];
        $port->permission_no = $input['permission_no'];
        $port->save();
    	return redirect('ports')->with('message','Port Added Successfully.');
    }
    public function edit($port_id)
    {
    	$port = Ports::find($port_id);
        return view('port.edit',compact('port'));
    }
    public function update(Request $request, $port_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Port Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $port = Ports::find($port_id);
        $port->name = $input['name'];
        $port->permission_no = $input['permission_no'];
        $port->save();
        return redirect('ports')->with('message','Port Update Successfully.');
    }
    public function delete($port_id)
    {
    	$port = Ports::find($port_id);
        $port->isActive = 0;
        $port->save();
        return redirect('ports')->with('message','Port Delete Successfully.');
    }
    public function data()
    {
    	$ports = Ports::where('isActive',1)->get();
        return Datatables::of($ports)
        ->addIndexColumn()
        ->editColumn('permission_no', function ($ports) { 
            if(empty($ports->permission_no)) { 
                return '-'; 
            } else { 
                return $ports->permission_no; 
            } 
        })
        ->addColumn('action', function ($ports) {
            return '<a href="port/edit/'.$ports->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="port/delete/'.$ports->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
