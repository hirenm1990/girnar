<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VGMDetails extends Model
{
    protected $table = 'vgm_details';
    protected $primaryKey = 'id';

    public function vgmcontainer()
    {
    	return $this->hasMany( 'App\VGMContainers', 'vgm_detail_id', 'id');
    }
}
