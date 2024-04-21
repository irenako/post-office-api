<?php

namespace App\Http\Controllers;

use App\Enums\DeliveryCostStatus;
use App\Enums\PackageStatus;
use App\Http\Requests\EditPackageRequest;
use App\Models\Delivery;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            'data' =>  [
                "packages" => Package::all()
            ]
        ]);
    }

    public function store(Request $request)
    {
        $recipient = User::findOrFail($request['recipient']);
        $sender = User::findOrFail($request['sender']);
        $delivery = Delivery::findOrFail($request['deliveryId']);
        var_dump($sender->id);
        var_dump($recipient->id);

        $package = Package::create([
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'delivery_id' => $delivery->id,
            'addressFrom' => $request['addressFrom'],
            'addressTo' => $request['addressTo'],
            'deliveryCost' => $request['cost'],
            'paymentStatus' => $request['paymentStatus'] === 'paid' ? DeliveryCostStatus::PAID->value : DeliveryCostStatus::PENDING->value,
        ]);
        return new JsonResponse([
            "status" => 'success',
            "message" => 'Package was created with id ' . $package->id,
        ]);
    }

    public function show(Request $request)
    {
        $package =  Package::findOrFail($request['id']);
        return new JsonResponse([
            'data' => [
                "package" => $package
            ]
        ]);
    }

    public function update(EditPackageRequest $request)
    {
        $package = Package::findOrFail($request->id);

        if ($request['recipient']) {
            $recipient = User::find($request['recipient']);
            $package->update(['recipientId' => $recipient->id]);
        }

        if ($request['addressTo']) {
            $package->update(['addressTo' => $request['addressTo']]);
        }

        if ($request['status']) {
            $package->update(['status' => $request['status']]);
        }

        if ($request['deliveryCost']) {
            $package->update(['deliveryCost' => $request['deliveryCost']]);
        }

        if ($request['paymentStatus']) {
            $package->update(['paymentStatus' => $request['paymentStatus']]);
        }

        return new JsonResponse([
            "status" => 'success',
            "message" => 'Package was updated with id ' . $package->id,
        ]);
    }

    public function destroy(Request $request)
    {
        $package = Package::findOrFail($request['id']);
        $package->delete();
        return new JsonResponse([
            "status" => 'success',
            "message" => 'Package was succesfully deleted',
        ]);
    }
}
