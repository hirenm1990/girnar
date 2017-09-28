<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    protected $table = 'shipments';
    protected $primaryKey = 'id';

    public function contract()
    {
        return $this->hasOne('App\Contracts','id', 'contract_id');
    }

    public function deliveryorder()
    {
    	return $this->hasOne('App\DeliveryOrders','shipment_id', 'id');
    }

    public function stuffing()
    {
        return $this->hasOne('App\StuffingInvoices','shipment_id', 'id');
    }

    public function FunctionName($value='')
    {
        # code...
    }
}
