<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table name
    protected $table = 'products';
    // Primary key
    public $primaryKey = 'id';
}
