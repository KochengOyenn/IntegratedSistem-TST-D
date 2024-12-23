<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getPrices(Request $request)
    {
        $bahanList = $request->input('bahan'); // Daftar bahan dari query parameter
        if (!$bahanList) {
            return response()->json(['error' => 'No ingredients provided'], 400);
        }

        $prices = Produk::whereIn('nama_produk', $bahanList)->get(['nama_produk', 'harga_produk']);
        return response()->json($prices);
    }
}
