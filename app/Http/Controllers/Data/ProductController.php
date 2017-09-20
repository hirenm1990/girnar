<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,DataTables;
use App\Products;

class ProductController extends Controller
{
    public function index()
    {
    	return view('product.index');
    }
    public function create()
    {
        return view('product.create');	
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required|unique:products',
           'hs_code' =>'required',
        ];

        $message = [
            'unique' => "This Product Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $product = new Products;
        $product->name = $input['name'];
        $product->hs_code = $input['hs_code'];
        $product->shortcode = $input['shortcode'];
        $product->dbk_scheme_no = $input['dbk_scheme_no'];
        $product->fob = $input['fob'];
        $product->file_no = $input['file_no'];
        $product->save();
    	return redirect('products')->with('message','Product Added Successfully.');
    }
    public function edit($product_id)
    {
    	$product = Products::find($product_id);
        return view('product.edit',compact('product'));
    }
    public function update(Request $request, $product_id)
    {
        $input = $request->all();
        $rules = [
           'name' =>'required',
           'hs_code' =>'required',
        ];

        $message = [
            'unique' => "This Product Already Added.",
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }

        $product = Products::find($product_id);
        $product->name = $input['name'];
        $product->hs_code = $input['hs_code'];
        $product->shortcode = $input['shortcode'];
        $product->dbk_scheme_no = $input['dbk_scheme_no'];
        $product->fob = $input['fob'];
        $product->file_no = $input['file_no'];
        $product->save();
        return redirect('products')->with('message','Product Update Successfully.');
    }
    public function delete($product_id)
    {
    	$product = Products::find($product_id);
        $product->isActive = 0;
        $product->save();
        return redirect('products')->with('message','Product Delete Successfully.');
    }
    public function data()
    {
    	$products = Products::where('isActive',1)->get();
        return Datatables::of($products)
        ->addIndexColumn()
        ->editColumn('shortcode', function ($products) { if(empty($products->shortcode)) { return '-'; }else { return $products->shortcode; } })
        ->editColumn('dbk_scheme_no', function ($products) { if(empty($products->dbk_scheme_no)) { return '-'; }else { return $products->dbk_scheme_no; } })
        ->addColumn('action', function ($products) {
            return '<a href="product/edit/'.$products->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp
                    <a href="product/delete/'.$products->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                    ';
        })
        ->make(true);
    }
}
