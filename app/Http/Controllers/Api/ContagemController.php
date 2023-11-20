<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\JsonResponse;

class ContagemController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(['count' => Pessoa::count()]);
    }
}
