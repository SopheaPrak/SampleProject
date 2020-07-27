<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_item extends Model
{
    protected $table = 'invoice_items';
    public $primarykey = 'id';

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
