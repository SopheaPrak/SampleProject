<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_total extends Model
{
    protected $table = 'invoice_totals';
    public $primarykey = 'id';

    protected $fillable = [
        'total_amount',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
