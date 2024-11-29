<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Provider' => $this->provider_id,
            'Amount' => '₦'.$this->amount,
            'Payment Date' => $this->created_at,
            'Meter Number' => str_repeat('*', strlen($this->meter_number) - 4) . substr($this->meter_number, -4),
            'Customer' => $this->user_id,
        ];
    }
}
