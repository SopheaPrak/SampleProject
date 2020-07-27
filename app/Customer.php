<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $primarykey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
