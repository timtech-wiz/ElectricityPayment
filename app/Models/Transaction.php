<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['provider_id', 'amount', 'meter_number', 'user_id'];


    public function providerId():Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Provider::where('id', $value)->pluck('name'),
        );
    }

    public function userId():Attribute
    {
        return Attribute::make(
            get: fn (string $value) => User::where('id', $value)->select('name', 'email')->get(),
        );
    }

    public function createdAt():Attribute
    {
        return Attribute::make(
            get: fn (string $value) => \Carbon\Carbon::parse($value)->format('d-m-Y H:i'),
        );
    }
}


