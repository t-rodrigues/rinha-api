<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\JsonResponse;

class ContagemController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['count' => Pessoa::count()]);
    }
}
