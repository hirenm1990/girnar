<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StuffingInvoices;

use App\Contracts;
use App\ContractProducts;
use App\Shipments;
use App\ContainerDetails;
use App\ContainerProducts;


class StuffingController extends Controller
{
    public function edit( $shipment_id )
    {
     	$shipment = Shipments::where( 'id', $shipment_id )->first();
    	$contract = Contracts::find( $shipment->contract->id );
        $contract_products = ContractProducts::where( 'shipment_id', $shipment_id )->get();
        $stuffing = StuffingInvoices::where( 'shipment_id',$shipment_id )->first();
    	$container_details = ContainerDetails::where( 'shipment_id',$shipment_id )->get();
    	$container_products = ContainerProducts::where('shipment_id',$shipment_id)->get();

        if( !$stuffing ) {
    		$stuffing_invoice = new StuffingInvoices;
    		$stuffing_invoice->shipment_id = $shipment_id;
    		$stuffing_invoice->contract_id = $contract->id;
    		$stuffing_invoice->save();
    	}

    	return view('contract.stuffing',compact('contract','container_products','container_details','contract_products','stuffing','shipment','shipment_id'));
    }


    public function update(Request $request, $shipment_id )
    {
        $input = $request->all();

     	$shipment = Shipments::find( $shipment_id );
        
    	$contract = Contracts::find( $shipment->contract->id );

    	$stuffing_invoice = StuffingInvoices::find( $shipment->stuffing->id );
    	$stuffing_invoice->contract_id = $contract->id;
    	$stuffing_invoice->shipment_id = $shipment_id;
    	$stuffing_invoice->invoice_no = $input['invoice_no'];
    	( $input['invoice_date'] !="" ) ? $stuffing_invoice->invoice_date = date('Y-m-d',strtotime( $input['invoice_date'] )) : "";
    	$stuffing_invoice->are_no = $input['are_no'];
    	($input['are_date'] !="") ? $stuffing_invoice->are_date = date('Y-m-d',strtotime( $input['are_date'] )) :"";
    	$stuffing_invoice->dbk_rate = $input['dbk_rate'];
    	$stuffing_invoice->file_no = $input['file_no'];
    	$stuffing_invoice->freight = $input['freight'];
    	$stuffing_invoice->extra_charge_name = $input['extra_charge_name'];
    	$stuffing_invoice->extra_charge_amount = $input['extra_charge_amount'];
    	$stuffing_invoice->examining_officer = $input['examining_officer'];
    	$stuffing_invoice->supervision_officer = $input['supervision_officer'];
    	$stuffing_invoice->examining_officer = $input['examining_officer'];
        $stuffing_invoice->container_markings = $input['container_markings'];
    	$stuffing_invoice->examined = $input['examined'];
    	$stuffing_invoice->save();

        
        if( $input['container_detail_flag'] == 0) {

            // Twenty Container
            foreach ($input['container_size_tw'] as $key => $value) {

                if (empty($input['container_detail_id_tw'][$key])) {
                    $container_detail = new ContainerDetails;
                } else {
                    $container_detail = ContainerDetails::find($input['container_detail_id'][$key]);
                }

            	$container_detail->contract_id = $contract->id;
            	$container_detail->shipment_id = $shipment_id;
            	$container_detail->container_size = $input['container_size_tw'][$key];
            	$container_detail->container_no = $input['container_no_tw'][$key];
            	$container_detail->self_seal_no = $input['self_seal_no_tw'][$key];
                $container_detail->line_seal_no = $input['line_seal_no_tw'][$key];
            	$container_detail->flexi_no_pkgs = $input['flexi_no_pkgs_tw'][$key];
            	$container_detail->gross_weight = $input['gross_weight_tw'][$key];
            	$container_detail->net_weight = $input['net_weight_tw'][$key];
                $container_detail->save();

                foreach ($input['product_flexi_no_pkgs_tw'] as $key => $value) {
                    
                    // // ContainerProducts::where('containers_detail_id',$container_detail->id)->delete();
                    // if(empty($input['container_product_id'][$key])) {
                    //     $container_product = new ContainerProducts;    
                    // } else {
                    //     $container_product = ContainerDetails::find($input['container_product_id'][$key]);
                    // }
                    $container_product = new ContainerProducts;
                    $container_product->contract_id = $contract->id;
                    $container_product->shipment_id = $shipment_id;
                    $container_product->containers_detail_id = $container_detail->id;
                    $container_product->product_id = $input['product_id_tw'][$key];
                    $container_product->product_name = $input['product_name_tw'][$key];
                    $container_product->product_flexi_no_pkgs = $input['product_flexi_no_pkgs_tw'][$key];
                    $container_product->product_gross_weight = $input['product_gross_weight_tw'][$key];
                    $container_product->product_net_weight = $input['product_net_weight_tw'][$key];
                    $container_product->save();

                }
            }

            // Forty Container
            foreach ($input['container_size_ft'] as $key => $value) {

                if (empty($input['container_detail_id_ft'][$key])) {
                    $container_detail = new ContainerDetails;
                } else {
                    $container_detail = ContainerDetails::find($input['container_detail_id'][$key]);
                }

                $container_detail->contract_id = $contract->id;
                $container_detail->shipment_id = $shipment_id;
                $container_detail->container_size = $input['container_size_ft'][$key];
                $container_detail->container_no = $input['container_no_ft'][$key];
                $container_detail->self_seal_no = $input['self_seal_no_ft'][$key];
                $container_detail->line_seal_no = $input['line_seal_no_ft'][$key];
                $container_detail->flexi_no_pkgs = $input['flexi_no_pkgs_ft'][$key];
                $container_detail->gross_weight = $input['gross_weight_ft'][$key];
                $container_detail->net_weight = $input['net_weight_ft'][$key];
                $container_detail->save();

                foreach ($input['product_flexi_no_pkgs_ft'] as $key => $value) {
                    
                    // // ContainerProducts::where('containers_detail_id',$container_detail->id)->delete();
                    // if(empty($input['container_product_id'][$key])) {
                    //     $container_product = new ContainerProducts;    
                    // } else {
                    //     $container_product = ContainerDetails::find($input['container_product_id'][$key]);
                    // }
                    $container_product = new ContainerProducts;
                    $container_product->contract_id = $contract->id;
                    $container_product->shipment_id = $shipment_id;
                    $container_product->containers_detail_id = $container_detail->id;
                    $container_product->product_id = $input['product_id_ft'][$key];
                    $container_product->product_name = $input['product_name_ft'][$key];
                    $container_product->product_flexi_no_pkgs = $input['product_flexi_no_pkgs_ft'][$key];
                    $container_product->product_gross_weight = $input['product_gross_weight_ft'][$key];
                    $container_product->product_net_weight = $input['product_net_weight_ft'][$key];
                    $container_product->save();
                }
            }

        } else {
            
            foreach ($input['container_size'] as $key => $value) {

                $container_detail = ContainerDetails::find($input['container_detail_id'][$key]);
                
                $container_detail->contract_id = $contract->id;
                $container_detail->shipment_id = $shipment_id;
                $container_detail->container_size = $input['container_size'][$key];
                $container_detail->container_no = $input['container_no'][$key];
                $container_detail->self_seal_no = $input['self_seal_no'][$key];
                $container_detail->line_seal_no = $input['line_seal_no'][$key];
                $container_detail->flexi_no_pkgs = $input['flexi_no_pkgs'][$key];
                $container_detail->gross_weight = $input['gross_weight'][$key];
                $container_detail->net_weight = $input['net_weight'][$key];
                $container_detail->save();

                // ContainerProducts::where('containers_detail_id', $container_detail->id)->delete();

                foreach ($input['product_flexi_no_pkgs'] as $key => $value) {
                        
                    $container_product = ContainerProducts::find( $input['container_product_id'][$key] );

                    if( $container_detail->id ==  $container_product->containers_detail_id ) {
                        
                        $container_product->contract_id = $contract->id;
                        $container_product->shipment_id = $shipment_id;
                        $container_product->containers_detail_id = $container_detail->id;
                        $container_product->product_id = $input['product_id'][$key];
                        $container_product->product_name = $input['product_name'][$key];
                        $container_product->product_flexi_no_pkgs = $input['product_flexi_no_pkgs'][$key];
                        $container_product->product_gross_weight = $input['product_gross_weight'][$key];
                        $container_product->product_net_weight = $input['product_net_weight'][$key];
                        $container_product->save();
                    }

                    // $container_product = new ContainerProducts;
                    // ContainerProducts::where('id', )->delete();
                    
                }
            }

        }

    	return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Update Successfully.');
    }

    public function AddTWContainer( $shipment_id )
    {
        $shipment = Shipments::find( $shipment_id );
        
        $contract = Contracts::find( $shipment->contract->id );

        $contract_products = ContractProducts::where( 'shipment_id', $shipment_id )->get();

        $container_detail = new ContainerDetails;
        $container_detail->contract_id = $contract->id;
        $container_detail->shipment_id = $shipment_id;
        $container_detail->container_size = "20 feet";
        // $container_detail->container_no ="";
        // $container_detail->self_seal_no ="";
        // $container_detail->line_seal_no ="";
        // $container_detail->flexi_no_pkgs ="";
        // $container_detail->gross_weight ="";
        // $container_detail->net_weight ="";
        $container_detail->save();

        foreach ($contract_products as $product) {    
            $container_product = new ContainerProducts;
            $container_product->contract_id = $contract->id;
            $container_product->shipment_id = $shipment_id;
            $container_product->containers_detail_id = $container_detail->id;
            $container_product->product_id = $product->id;
            $container_product->product_name = $product->product->name;
            // $container_product->product_flexi_no_pkgs ="";
            // $container_product->product_gross_weight ="";
            // $container_product->product_net_weight ="";
            $container_product->save();
        }

        $shipment->container_size_twenty = $shipment->container_size_twenty + 1;
        $shipment->save();

        return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Container 20'."'".' Added Successfully.');
    }

    public function AddFWContainer( $shipment_id )
    {
        $shipment = Shipments::find( $shipment_id );
        $contract = Contracts::find( $shipment->contract->id );
        $contract_products = ContractProducts::where( 'shipment_id', $shipment_id )->get();
        
        $container_detail = new ContainerDetails;
        $container_detail->contract_id = $contract->id;
        $container_detail->shipment_id = $shipment_id;
        $container_detail->container_size = "40 feet";
        // $container_detail->container_no ="";
        // $container_detail->self_seal_no ="";
        // $container_detail->line_seal_no ="";
        // $container_detail->flexi_no_pkgs ="";
        // $container_detail->gross_weight ="";
        // $container_detail->net_weight ="";
        $container_detail->save();

        foreach ($contract_products as $product) {
            $container_product = new ContainerProducts;
            $container_product->contract_id = $contract->id;
            $container_product->shipment_id = $shipment_id;
            $container_product->containers_detail_id = $container_detail->id;
            $container_product->product_id = $product->id;
            $container_product->product_name = $product->product->name;
            // $container_product->product_flexi_no_pkgs ="";
            // $container_product->product_gross_weight ="";
            // $container_product->product_net_weight ="";
            $container_product->save();
        }

        $shipment->container_size_forty = $shipment->container_size_forty + 1;
        $shipment->save();

        return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Container 40'."'".' Added Successfully.');
    }

    public function stuffingConatainerRemove( $container_detail_id )
    {
        ContainerProducts::where('containers_detail_id', $container_detail_id )->delete();
        $container_detail = ContainerDetails::find( $container_detail_id );
        $shipment_id = $container_detail->shipment_id;
        
        $shipment = Shipments::find( $shipment_id );
        if( $container_detail->container_size == '20 feet' ) {
            $shipment->container_size_twenty = $shipment->container_size_twenty - 1;
            $shipment->save();
        } else {
            $shipment->container_size_forty = $shipment->container_size_forty - 1;
            $shipment->save();
        }

        $container_detail->delete();

        return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Container Deleted Successfully.');
    }

    public function ConatainerRemoveByShipmentTw( $shipment_id )
    {
        $shipment = Shipments::find( $shipment_id );
        $shipment->container_size_twenty = $shipment->container_size_twenty - 1;
        $shipment->save();

        return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Container Deleted Successfully.');
    }

    public function ConatainerRemoveByShipmentFt( $shipment_id )
    {
        $shipment = Shipments::find( $shipment_id );
        $shipment->container_size_forty = $shipment->container_size_forty - 1;
        $shipment->save();

        return Redirect('contract/detail/'.$shipment_id.'#stuffing')->with('message','Stuffing Container Deleted Successfully.');
    }   
}
