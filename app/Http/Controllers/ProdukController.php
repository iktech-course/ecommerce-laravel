<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index',[
            'produks' => produk::all()
        ]);
    }
}
