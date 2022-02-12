<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// perintah : php artisan make:controller NamaController
class ProductController extends Controller
{
    public function data()
    {
        // query dari table database
        $product = DB::table('product')->get();
        return view('product.data', ['product' => $product]);
    }

    public function add()
    {
        return view('product.add');
    }

    // function untuk memproses add
    public function addProcess(Request $request)
    {
        // tambah data ke database
        DB::table('product')->insert([
            'name' => $request->nama_produk,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        return redirect('product')->with('status', 'New Product is Saved');
    }

    public function edit($id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        return view('product/edit', compact('product'));
    }

    // function untuk memproses edit
    public function editProcess(Request $request, $id)
    {
        // edit data di database
        DB::table('product')->where('id', $id)->update([
            'name' => $request->nama_produk,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        return redirect('product')->with('status', 'The Product is Being Updated');
    }

    public function delete($id)
    {
        // hapus data di database
        DB::table('product')->where('id', $id)->delete();
        return redirect('product')->with('status', 'The Product Has Been Delete');
    }
}
