<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    public function __invoke(Pessoa $pessoa): Response
    {
        $pessoa->delete();

        return response()->noContent();
    }
}
