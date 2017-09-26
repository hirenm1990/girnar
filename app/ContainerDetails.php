<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerDetails extends Model
{
    protected $table = 'containers_details';
    protected $primaryKey = 'id';

    public function containerproduct()
    {
    	return $this->hasMany('App\ContainerProducts', 'containers_detail_id', 'id');
    }
}
