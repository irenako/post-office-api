<?php

use App\Enums\DeliveryCostStatus;
use App\Enums\PackageStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users');
            $table->foreignId('recipient_id')->constrained('users');
            $table->foreignId('delivery_id')->constrained('deliveries')->default(1);
            $table->string('addressFrom');
            $table->string('addressTo');
            $table->enum('status', PackageStatus::toArray())->default(PackageStatus::CREATED->value);
            $table->decimal('deliveryCost', 10, 2)->default(0);
            $table->enum('paymentStatus', DeliveryCostStatus::toArray())->default(DeliveryCostStatus::PENDING->value);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
