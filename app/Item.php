<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    public $primarykey = 'id';

    protected $casts = [
        'enabled' => 'boolean',
    ];

    protected $fillable = [
        'name', 'description', 'category_id', 'sale_price' , 'purchase_price', 'quantity', 'enabled',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function invoice_item(){
        return $this->belongsTo(Invoice_item::class);
    }
}
