<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function options(Request $request, Response $response)
    {
        return $response;
    }
}
