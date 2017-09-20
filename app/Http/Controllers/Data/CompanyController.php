<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\CompanyDetails;

class CompanyController extends Controller
{
    public function index()
    {
    	return view('company.index');
    }
    public function create()
    {
        return view('company.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:company_details',
           'address' =>'required',
           'gst_no' =>'required',
           'iec_no' =>'required',
           'lut_no' =>'required',
           'pan_no' =>'required',
        ];

        $message = [
            'unique' => "This Company Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $company = new CompanyDetails;
        $company->name = $input['name'];
        $company->address = $input['address'];
        $company->phone = $input['phone'];
        $company->phone2 = $input['phone2'];
        $company->weighbridge_address = $input['weighbridge_address'];
        $company->weighbridge_reg_no = $input['weighbridge_reg_no'];
        $company->gst_no = $input['gst_no'];
        $company->iec_no = $input['iec_no'];
        $company->lut_no = $input['lut_no'];
        $company->pan_no = $input['pan_no'];
        $company->website = $input['website'];
        $company->save();

        return redirect('companys')->with('message','Company Added Successfully.');
    }
    public function edit($company_id)
    {
    	$company = CompanyDetails::find($company_id);
        return view('company.edit',compact('company'));
    }
    public function update(Request $request, $company_id)
    {   
    	$input = $request->all();
        $rules = [
           'name' =>'required',
           'address' =>'required',
           'gst_no' =>'required',
           'iec_no' =>'required',
           'lut_no' =>'required',
           'pan_no' =>'required',
        ];

        $message = [
            'unique' => "This Company Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $company = CompanyDetails::find($company_id);
        $company->name = $input['name'];
        $company->address = $input['address'];
        $company->phone = $input['phone'];
        $company->phone2 = $input['phone2'];
        $company->weighbridge_address = $input['weighbridge_address'];
        $company->weighbridge_reg_no = $input['weighbridge_reg_no'];
        $company->gst_no = $input['gst_no'];
        $company->iec_no = $input['iec_no'];
        $company->lut_no = $input['lut_no'];
        $company->pan_no = $input['pan_no'];
        $company->website = $input['website'];
        $company->save();

        return redirect('companys')->with('message','Company Update Successfully.');
    }
    public function delete($company_id)
    {
    	$company = CompanyDetails::find($company_id);
        $company->isActive = 0;
        $company->save();
        return redirect('companys')->with('message','Company Delete Successfully.');
    }
    public function data()
    {
    	$companys = CompanyDetails::where('isActive',1)->get();
        return Datatables::of($companys)
        ->addIndexColumn()
        ->editColumn('phone', function ($companys) { if(empty($companys->phone)) { return '-'; }else { return $companys->phone; } })
        ->editColumn('weighbridge_reg_no', function ($companys) { if(empty($companys->weighbridge_reg_no)) { return '-'; }else { return $companys->weighbridge_reg_no; } })
        ->addColumn('action', function ($companys) {
            return '<a href="company/edit/'.$companys->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="company/delete/'.$companys->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
