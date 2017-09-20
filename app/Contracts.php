<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
	protected $table = 'contracts';
    protected $primaryKey = 'id';

    public function buyer() 
    {
        return $this->hasOne('App\BuyerDetails', 'id', 'buyer_id');
    }
    public function shipments()
    {
        return $this->belongsTo('App\Shipments', 'contract_id', 'id');
    }
    
}
