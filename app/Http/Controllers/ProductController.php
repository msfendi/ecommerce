<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads');
        } else {
            $path = '';
        }

        // tambah data ke database
        DB::table('product')->insert([
            'name' => $request->nama_produk,
            'price' => $request->price,
            'image' => $path,
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
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads');
        } else {
            $path = '';
        }

        $pathImage = DB::table('product')->where('id', $id)->first()->image;

        if ($pathImage != null || $pathImage != '') {
            Storage::delete($pathImage);
        }

        // edit data di database
        DB::table('product')->where('id', $id)->update([
            'name' => $request->nama_produk,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect('product')->with('status', 'The Product is Being Updated');
    }

    public function delete($id)
    {

        $pathImage = DB::table('product')->where('id', $id)->first()->image;

        if ($pathImage != null || $pathImage != '') {
            Storage::delete($pathImage);
        }
        // hapus data di database
        DB::table('product')->where('id', $id)->delete();
        return redirect('product')->with('status', 'The Product Has Been Delete');
    }
}
