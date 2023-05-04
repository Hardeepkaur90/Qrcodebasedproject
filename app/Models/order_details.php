<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;

    public function item_details(){
        return $this->belongsTo('App\Models\Items','item_id','id');
    }
}
