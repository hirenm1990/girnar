<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    protected $table = 'shipments';
    protected $primaryKey = 'id';

    public function contract()
    {
        return $this->hasOne('App\Contracts','id','contract_id');
    }
}
