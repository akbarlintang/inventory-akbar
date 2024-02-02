<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $productHistory = ProductHistory::all();

        $productHistory = ProductHistory::select(
            \DB::raw('MAX(kode) as kode'),
            'nama',
            \DB::raw('SUM(harga) as total_harga'),
            \DB::raw('COUNT(*) as total_barang'),
            \DB::raw("CASE WHEN COUNT(*) = 1 THEN 'Baru' ELSE 'Penambahan' END AS status")
        )
        ->groupBy('nama')
        ->orderBy('nama', 'asc')
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $productHistory,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductHistory $productHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductHistory $productHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductHistory $productHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductHistory $productHistory)
    {
        //
    }
}
