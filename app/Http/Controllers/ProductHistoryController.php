<?php

namespace App\Http\Controllers;

use App\Models\ProductHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductHistoryController extends Controller
{
    public function index()
    {
        return view('product-history.index');
    }
}
