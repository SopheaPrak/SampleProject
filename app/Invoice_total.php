<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_total extends Model
{
    protected $table = 'invoice_totals';
    public $primarykey = 'id';

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
