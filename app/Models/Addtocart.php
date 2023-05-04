<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addtocart extends Model
{
    use HasFactory;

    protected $table ="addtocarts";
    protected $guarded=[];

    public function itemDetail()
    {
        return $this->hasOne(Items::class, 'id','item_id');
    }

}
