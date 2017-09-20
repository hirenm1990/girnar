<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Packages;

class PackageController extends Controller
{
    public function index()
    {
    	return view('package.index');
    }
    public function create()
    {
        return view('package.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:packages',
        ];

        $message = [
            'unique' => "This Package Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $package = new Packages;
        $package->name = $input['name'];
        $package->save();
    	return redirect('packages')->with('message','Package Added Successfully.');
    }
    public function edit($package_id)
    {
    	$package = Packages::find($package_id);
        return view('package.edit',compact('package'));
    }
    public function update(Request $request, $package_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
        ];

        $message = [
            'unique' => "This Package Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $package = Packages::find($package_id);
        $package->name = $input['name'];
        $package->save();
        return redirect('packages')->with('message','Package Update Successfully.');
    }
    public function delete($package_id)
    {
    	$package = Packages::find($package_id);
        $package->isActive = 0;
        $package->save();
        return redirect('packages')->with('message','Package Delete Successfully.');
    }
    public function data()
    {
    	$packages = Packages::where('isActive',1)->get();
        return Datatables::of($packages)
        ->addIndexColumn()
        ->addColumn('action', function ($packages) {
            return '<a href="package/edit/'.$packages->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="package/delete/'.$packages->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
