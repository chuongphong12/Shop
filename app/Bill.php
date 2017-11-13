<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    protected $fillable = ['id_customer', 'date_order', 'total','payment','note','status'];

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }
    public function bill(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
