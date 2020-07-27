<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    public $primarykey = 'id';

    public function invoice_item(){
        return $this->hasOne(Invoice_item::class);
    }

    public function customers(){
        return $this->belongsTo(Customer::class);
    }
}
