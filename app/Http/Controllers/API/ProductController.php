<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Products::all();

        return response()->json([
            'meta' => [
                'status' => 'success',
                'message' => 'Data Successfully Fetching'
            ], 'data' =>  $data
        ], 201);
    }
}
