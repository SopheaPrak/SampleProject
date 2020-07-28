<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    public $primarykey = 'id';

    protected $fillable = [
        'amount', 'currency', 'customer_id',
    ];

    public function invoice_item(){
        return $this->hasOne(Invoice_item::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function invoice_total(){
        return $this->hasOne(Invoice_total::class);
    }
}
