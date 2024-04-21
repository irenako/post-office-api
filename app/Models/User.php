<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $protected = [];

    protected $fillable = ['firstName', "lastName", 'middleName', 'phone', 'email', 'address', 'city'];

    protected $primaryKey = 'phone';

    public function packagesSent()
    {
        return $this->hasMany(Package::class, 'sender_id');
    }

    public function packagesReceived()
    {
        return $this->hasMany(Package::class, 'recipient_id');
    }

}
