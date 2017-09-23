<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LodingPortDetails extends Model
{
    protected $table = 'loding_port_details';
    protected $primaryKey = 'id';

    public function loding_port() 
    {
        return $this->hasOne('App\Ports', 'id', 'loading_port_id');
    }

    public function discharge_port() 
    {
        return $this->hasOne('App\DischargePorts', 'id', 'discharge_port_id');
    }

    public function final_destination() 
    {
        return $this->hasOne('App\FinalDestinations', 'id', 'final_destination_id');
    }

    public function destination_country()
    {
        return $this->hasOne('App\Countries', 'id', 'destination_country_id');
    }
}
