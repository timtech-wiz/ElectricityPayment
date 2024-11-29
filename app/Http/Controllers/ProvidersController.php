<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProvidersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request):AnonymousResourceCollection
    {
        return ProviderResource::collection(Provider::all());
    }
}
