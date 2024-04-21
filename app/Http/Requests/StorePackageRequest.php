<?php

namespace App\Http\Requests;

use App\Enums\DeliveryCostStatus;
use App\Enums\PackageStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipient' => [
                'required',
                'string',
                Rule::exists('users', 'phone'),
            ],
            'sender' => [
                'required',
                'string',
                Rule::exists('users', 'phone'),
            ],
            'deliveryId' => [
                'required',
                'integer',
                Rule::exists('deliveries', 'id'),
            ],
            'addressTo' => 'required|string|max:255',
            'addressFrom' => 'required|string|max:255',
            'deliveryCost' => 'required|numeric', 
            'paymentStatus' => [
                'required',
                'string',
                Rule::in(DeliveryCostStatus::toArray()),
            ],
        ];
    }
}
