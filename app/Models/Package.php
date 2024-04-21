<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $protected = [];

    protected $fillable = ['sender_id', 'recipient_id', 'delivery_id', 'addressFrom', 'addressTo', 'status', 'deliveryCost', 'paymentStatus'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id', 'id');
    }

    public function deliveryProvider()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }
}
