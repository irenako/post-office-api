<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $protected = [];

    protected $fillable = ['senderId', 'recipientId', 'deliveryId', 'addressFrom', 'addressTo', 'status', 'deliveryCost', 'paymentStatus'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function deliveryProvider()
    {
        return $this->belongsTo(Delivery::class, 'deliveryProviderId');
    }
}
