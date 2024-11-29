<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PaymentRequest $request)
    {
        $user = Auth::user();
        $data = array_merge($request->validated(), ['user_id' => $user->id]);
        Transaction::create($data);
        return response()->json([
            "status" => true,
            "message" => "Electricity Payment successful",
            "data" => $data,
        ]); 
    }

    public function fetchPaymentHistory():AnonymousResourceCollection
    {
        $user = Auth::user();
        return TransactionResource::collection(Transaction::where('user_id', $user->id)->get());
    }
}
