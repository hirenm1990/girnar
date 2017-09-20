<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrders extends Model
{
    protected $table = 'delivery_orders';
    protected $primaryKey = 'id';

    public function forwarder()
    {
    	return $this->hasOne('App\Forwarders', 'id', 'forwarder_id');
    }
}
