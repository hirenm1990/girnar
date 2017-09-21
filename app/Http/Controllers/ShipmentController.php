<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,DataTables;
use App\Contracts;
use App\Surveyors;
use App\DollorExchanges;
use App\BuyerDetails;
use App\DeliveryTerms;
use App\PaymentTerms;
use App\Shipments;
use App\Ports;
use App\DischargePorts;
use App\FinalDestinations;
use App\Countries;

class ShipmentController extends Controller
{
    public function edit($shipment_id)
    {
    	$shipment = Shipments::find($shipment_id);
    }
    public function update($shipment_id)
    {
    	$shipment = Shipments::find($shipment_id);
    }
}
