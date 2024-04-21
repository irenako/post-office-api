<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    
    protected $protected = [];

    protected $fillable = ['name', 'abbreviation'];

    public function packages()
    {
        return $this->hasMany(Package::class, 'delivery_id', 'id');
    }
}
