<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractProducts extends Model
{
    protected $table = 'contract_products';
    protected $primaryKey = 'id';

    public function Lodingportdetail() 
    {
        return $this->hasOne('App\LodingPortDetails', 'id', 'discharge_port');
    }

    public function product()
    {
    	return $this->hasOne('App\Products', 'id', 'product_id');
    }
}
