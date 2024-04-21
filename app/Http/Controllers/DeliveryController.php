<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            'data' => [
                'deliveries' => Delivery::all()
            ]
        ]);
    }

    public function store(Request $request)
    {
        if (Delivery::find($request['id'])) {
            return response(['message' => 'Delivery method already exists'], 409);
        }

        $delivery = Delivery::create([
            "name" => $request['name'],
            'abbreviation' => $request['abbreviation'],
        ]);

        return new JsonResponse([
            "status" => 'success',
            "message" => 'Delivery method was created with id ' . $delivery->id,
        ]);
    }

    public function show(Request $request)
    {
        $delivery = Delivery::find($request['id']);

        if (!$delivery) {
            return new JsonResponse([
                "status" => 'error',
                "message" => 'Delivery method not found with id ' . $request['id'],
            ], 404);
        }
        return new JsonResponse([
            'data' => [
                'delivery' => $delivery
            ]
        ]);
    }

    public function update(Request $request)
    {
        $delivery = Delivery::find($request['id']);

        if (!$delivery) {
            return new JsonResponse([
                "status" => 'error',
                "message" => 'Delivery method not found with id ' . $request['id'],
            ], 404);
        }

        if ($request['name']) {
            $delivery->update(['name' => $request['name']]);
        }

        if ($request['abbreviation']) {
            $delivery->update(['abbreviation' => $request['abbreviation']]);
        }

        return new JsonResponse([
            "status" => 'success',
            "message" => 'Delivery method was updated with id ' . $delivery->id,
        ]);
    }

    public function destroy(Request $request)
    {
        $delivery = Delivery::find($request['id']);

        if (!$delivery) {
            return new JsonResponse([
                "status" => 'error',
                "message" => 'Delivery method not found with id ' . $request['id'],
            ], 404);
        }

        $delivery->delete();
        return new JsonResponse([
            "status" => 'success',
            "message" => 'Delivery method was succesfully deleted',
        ]);
    }

    public function getAllPackages(Request $request)
    {
        
        $delivery = Delivery::findOrFail($request['id']);

        $packages = $delivery->packages;

        return new JsonResponse([
            'data' => [
                'packages' => $packages
            ]
        ]);
    }
}
