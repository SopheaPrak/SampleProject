<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $primarykey = 'id';

    protected $casts = [
        'enabled' => 'boolean',
    ];

    protected $fillable = [
        'name', 'description', 'enabled',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
