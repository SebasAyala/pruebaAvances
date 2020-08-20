<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'stock', 'description', 'state', 'warehouse_id'
    ];
    
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
}
