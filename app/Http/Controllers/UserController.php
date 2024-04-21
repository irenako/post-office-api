<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            'data' => [
                'users' => User::all()
            ]
        ]);
    }

    public function store(Request $request)
    {
        if (User::find($request['phone'])) {
            return response(['message' => 'User already exists'], 409);
        }

        $user = User::create([
            'firstName' => $request['firstName'],
            'middleName' => $request['middleName'],
            'lastName' => $request['lastName'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'city' => $request['city'],
            'address' => $request['address'],
        ]);

        return new JsonResponse([
            "status" => 'success',
            "message" => 'User was created with id ' . $user->id,
        ]);
    }

    public function show(Request $request)
    {
        $user = User::where('id', $request['id'])->first();
        return new JsonResponse([
            'data' => [
                'user' => $user
            ]
        ]);
    }

    public function update(EditUserRequest $request)
    {
        $user = User::findOrFail($request['phone']);

        if ($request['firstName']) {
            $user->update(['firstName' => $request['firstName']]);
        }

        if ($request['middleName']) {
            $user->update(['middleName' => $request['middleName']]);
        }

        if ($request['lastName']) {
            $user->update(['lastName' => $request['lastName']]);
        }

        if ($request['address']) {
            $user->update(['address' => $request['address']]);
        }

        if ($request['city']) {
            $user->update(['city' => $request['city']]);
        }

        if ($request['phone']) {
            $user->update(['phone' => $request['phone']]);
        }

        if ($request['email']) {
            $user->update(['email' => $request['email']]);
        }

        

        return new JsonResponse([
            "status" => 'success',
            "message" => 'User was updated with id ' . $user->id,
        ]);
    }

    public function destroy(Request $request)
    {
        $User = User::findOrFail($request['phone']);
        $User->delete();
        return new JsonResponse([
            "status" => 'success',
            "message" => 'User was succesfully deleted',
        ]);
    }

    public function getAllPackages(Request $request)
    {
        
        $user = User::findOrFail($request['phone']);

        $packagesSent = $user->packagesSent;
        $packagesReceived = $user->packagesReceived;

        return new JsonResponse([
            'data' => [
                'packages' => [
                    "packagesSent" => $packagesSent,
                    "packagesReceived" => $packagesReceived
                ]
            ]
        ]);
    }
}