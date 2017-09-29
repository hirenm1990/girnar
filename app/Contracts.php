<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
	protected $table = 'contracts';
    protected $primaryKey = 'id';

    public function buyer()
    {
        return $this->hasOne( 'App\BuyerDetails', 'id', 'buyer_id' );
    }
    public function shipments()
    {
        return $this->hasMany( 'App\Shipments', 'contract_id', 'id' );
    }

    public function company()
    {
        return $this->hasOne( 'App\CompanyDetails', 'id', 'company_id');
    }

    public function bank()
    {
        return $this->hasOne( 'App\BankDetails', 'id', 'bank_id');
    }

    public function contractproduct()
    {
        return $this->hasMany( 'App\ContractProducts', 'contract_id', 'id' );
    }
}
