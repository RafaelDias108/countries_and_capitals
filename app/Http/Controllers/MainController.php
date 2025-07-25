<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private array $app_data;

    public function __construct() {
        // load app_data file from app folder
        $this->app_data = require(app_path('app_data.php'));
    }

    public function showData(): JsonResponse
    {
        return response()->json($this->app_data);
    }
}
